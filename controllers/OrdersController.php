<?php

namespace app\controllers;

use Yii;
use app\models\Orders;
use app\models\OrdersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

/**
 * OrdersController implements the CRUD actions for Orders model.
 */
class OrdersController extends Controller
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
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return in_array(Yii::$app->user->identity->type, ['admin', 'manager', 'partner']);
                        },
                    ],
                ],
            ], 
        ];
    }

    /**
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if(!Yii::$app->request->get('sort')){
            if($orders = Orders::find()->where(['<', 'created_at', time() - 7200])->andWhere(['region_id' => null])->all()){
                foreach($orders as $order){
                    $order->delete();
                }
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orders model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        if(
            !in_array($model->region_id, array_values(ArrayHelper::map(Yii::$app->user->identity->regions, 'id', 'id')))
            && !in_array(Yii::$app->user->identity->type, ['admin', 'manager'])
            ){
            throw new NotFoundHttpException(Yii::t('app', 'Not ofund'));
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if(
            in_array($model->region_id, array_values(ArrayHelper::map(Yii::$app->user->identity->regions, 'id', 'id')))
            or in_array(Yii::$app->user->identity->type, ['admin', 'manager'])
            ){
            $model->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orders::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
