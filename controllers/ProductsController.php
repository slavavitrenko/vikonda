<?php

namespace app\controllers;

use Yii;
use app\models\Products;
use app\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

// saving images
use yii\web\UploadedFile;
use app\models\Pictures;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{

    public function init(){
        parent::init();
        $this->layout = '@app/views/layouts/dashboard';
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
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

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
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

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
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

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function saveImages($images, $model_id){
        foreach($images as $image){
            $date = date('Y-m-d_h:i:s');
            $filename = mb_substr(str_replace(["]", "[", "(", ")", " ", "\t", "\n"], '', $image->baseName), 0, 20);
            if($image->saveAs('uploads/products/' . $filename . $model_id . '_' . $date . '.' . $image->extension)){
                $imageModel = new Pictures;
                $imageModel->product_id = $model_id;
                $imageModel->path = $filename . $model_id . '_' . $date . '.' . $image->extension;
                $imageModel->save();
            }
        }
    }
}
