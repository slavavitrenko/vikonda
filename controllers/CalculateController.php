<?php

namespace app\controllers;


use Yii;
use yii\web\Controller;
use app\models\calculating\CalculateWindow;
use app\models\calculating\CalculateDoor;

class CalculateController extends Controller
{

	public function init(){
		parent::init();
		Yii::$app->response->format = 'json';
		$this->enableCsrfValidation = false;
	}

	public function actionWindow(){
		$model = new CalculateWindow;
		$model->load(Yii::$app->request->post(), '');
		// ============================================================================= //
		// ======= Внимание!! Заменить validate() на save() после тестирования ========= //
		// ============================================================================= //
		return $model->validate() ? ['sum' => $model->sum] : ['errors' => array_values($model->errors)];
	}

	public function actionDoor(){
		$model = new CalculateDoor;
		$model->load(Yii::$app->request->post(), '');
		// ============================================================================= //
		// ======= Внимание!! Заменить validate() на save() после тестирования ========= //
		// ============================================================================= //
		return $model->validate() ? ['sum' => $model->sum] : ['errors' => array_values($model->errors)];
	}
}