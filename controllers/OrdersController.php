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


class OrdersController extends Controller
{

	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['POST'],
					'take' => ['POST'],
					'untake' => ['POST'],
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

	public function actionView($id)
	{
		$model = $this->findModel($id);
		if(
			in_array($model->region_id, array_values(ArrayHelper::map(Yii::$app->user->identity->regions, 'id', 'id')))
			&& in_array(Yii::$app->user->identity->type, ['admin', 'manager'])
			or in_array($model->partner_id, ['0', Yii::$app->user->identity->id])
			){
			return $this->render('view', [
				'model' => $model,
			]);
		}
		else {
			throw new NotFoundHttpException(Yii::t('app', 'Not found'));
		}
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

	public function actionTake($id){
		$model = $this->findModel($id);
		if($model->partner_id == '0'){
			$model->updateAttributes([
					'partner_id' => Yii::$app->user->identity->id,
			]);
			Yii::$app->session->setFlash('success', Yii::t('app', 'You are succesfully taked item №{num}', ['num' => $id]));
		}
		return $this->goBack();
	}

	public function actionUntake($id){
		$model = $this->findModel($id);
		if($model->partner_id == Yii::$app->user->identity->id){
			$model->updateAttributes([
				'partner_id' => '0',
			]);
			Yii::$app->session->setFlash('warning', Yii::t('app', 'You are succesfully untaked item №{num}', ['num' => $id]));
		}
		return $this->goBack();
	}

	protected function findModel($id)
	{
		if (($model = Orders::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
