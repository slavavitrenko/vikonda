<?php

namespace app\controllers;

use Yii;
use app\models\WindowTypes;
use app\models\WindowTypesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


class WindowTypesController extends Controller
{

    use \app\traits\AjaxTrait;


    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new WindowTypesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new WindowTypes();

        if ($model->load(Yii::$app->request->post())) {

            $model->picture = $this->saveFile(UploadedFile::getInstance($model, 'picture'), $model->id);
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldPicture = $model->picture;

        if ($model->load(Yii::$app->request->post())) {
            $model->picture = $this->saveFile(UploadedFile::getInstance($model, 'picture'), $model->id);
            unlink($oldPicture);
            $model->save();
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

    protected function saveFile($image, $model_id){
            
            $date = date('Y-m-d_h:i:s');
            $filename = mb_substr(str_replace(["]", "[", "(", ")", " ", "\t", "\n"], '', $image->baseName), 0, 20);

            if($image->saveAs('uploads/window_types/' . $filename . $model_id . '_' . $date . '.' . $image->extension)) {
                return 'uploads/window_types/' . $filename . $model_id . '_' . $date . '.' . $image->extension;
            }
            return false;
    }

    protected function findModel($id)
    {
        if (($model = WindowTypes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
