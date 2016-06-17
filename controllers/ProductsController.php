<?php

namespace app\controllers;

use Yii;
use app\models\Products;
use app\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

// Image manipulation
use yii\imagine\Image;
use Imagine\Image\Box;

// saving images
use yii\web\UploadedFile;
use app\models\Pictures;


class ProductsController extends Controller
{

    public function init()
    {
        parent::init();
        $this->layout = '@app/views/layouts/dashboard';
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'add-in-cart' => ['post'],
                    'set-count' => ['post'],
                    'delete-from-cart' => ['post'],
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return Yii::$app->user->identity->type == 'admin';
                        },
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $data = [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ];
        return
        !Yii::$app->user->isGuest ? $this->render('index', $data)
        :
        $this->render('list', $data);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Products();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $this->saveImages(UploadedFile::getInstances($model, 'images'), $model->id);
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $this->saveImages(UploadedFile::getInstances($model, 'images'), $model->id);

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function saveImages($images, $model_id)
    {
        foreach($images as $image){
            $date = date('Y-m-d_h:i:s');
            $filename = mb_substr(str_replace(["]", "[", "(", ")", " ", "\t", "\n"], '', $image->baseName), 0, 20);
            if($image->saveAs('uploads/products/' . $filename . $model_id . '_' . $date . '.' . $image->extension)){
                $imageModel = new Pictures;
                $imageModel->product_id = $model_id;
                $imageModel->path = $filename . $model_id . '_' . $date . '.' . $image->extension;
                $imageModel->save(false);
                $filename = Yii::getAlias('@webroot') . '/uploads/products/' . $filename . $model_id . '_' . $date . '.' . $image->extension;
                $imagine = Image::getImagine()
                ->open($filename)
                ->thumbnail(new Box(1024, 1024))
                ->save($filename, ['quality' => 90]);
            }
        }
    }

    // Взаимодействие с корзиной
    public function actionAddInCart()
    {
        $postData = Yii::$app->request->post();
        return json_encode([
            'success' => Yii::$app->cart->add($postData['product_id'], $postData['count']),
            'cartStatus' => Yii::$app->cart->status
        ]);
    }
 
    public function actionSetCount()
    {
        $postData = Yii::$app->request->post();
        return json_encode([
            'success' => Yii::$app->cart->setCount($postData['product_id'], $postData['count']),
            'cartStatus' => Yii::$app->cart->status
        ]);
    }
 
    public function actionDeleteFromCart()
    {
        $postData = Yii::$app->request->post();
        return json_encode([
            'success' => Yii::$app->cart->delete($postData['product_id']),
            'cartStatus' => Yii::$app->cart->status
        ]);
    }

}
