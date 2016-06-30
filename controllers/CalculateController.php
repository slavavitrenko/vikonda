<?php

namespace app\controllers;


use Yii;
use yii\web\Controller;
use app\models\calculating\CalculateWindow;
use app\models\calculating\CalculateDoor;
use yii\web\NotFoundHttpException;

class CalculateController extends Controller
{

	public function init(){
		parent::init();
		Yii::$app->response->format = 'json';
		$this->enableCsrfValidation = false;
	}

	public function actionWindow(){
		if(($calculate_id = Yii::$app->request->post('calculate_id')) != false){
			$model = $this->findWindow($calculate_id);
			$model->calculate_type = 'order';
			$model->save();
			return $model;
		}
		$model = new CalculateWindow;
		$model->load(Yii::$app->request->post(), '');
		
		return $model->save() ? $model : ['errors' => array_values($model->errors)];
	}

	public function actionDoor(){
		if(($calculate_id = Yii::$app->request->post('calculate_id')) != false){
			$model = $this->findDoor($calculate_id);
			$model->calculate_type = 'order';
			$model->save();
			return $model;
		}
		$model = new CalculateDoor;
		$model->load(Yii::$app->request->post(), '');

		return $model->save() ? $model : ['errors' => array_values($model->errors)];
	}

    protected function findDoor($id)
    {
    	// УБРАТЬ комментарии в функции во избежение повторных заказов одного и того же окна
        if (($model = CalculateDoor::findOne($id)) !== null /* && $model->calculate_type != 'order'*/) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findWindow($id)
    {
    	// УБРАТЬ комментарии в функции во избежение повторных заказов одного и того же окна
        if (($model = CalculateWindow::findOne($id)) !== null /* && $model->calculate_type != 'order'*/) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}