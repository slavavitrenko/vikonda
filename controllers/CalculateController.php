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

	public function actionWindow($calculate_id = null){
		
		Yii::$app->response->format = 'json';

		if($calculate_id){
			$model = $this->findWindow($calculate_id);
			$model->calculate_type = 'order';
			$model->save(false);
			return $model;
		}
		$model = new CalculateWindow;
		$model->load(Yii::$app->request->post(), '');
		
		return $model->save() ? $model : ['errors' => array_values($model->errors)];
	}

	public function actionDoor($calculate_id = null){
			
		Yii::$app->response->format= 'json';

		if($calculate_id){
			$model = $this->findDoor($calculate_id);
			$model->calculate_type = 'order';
			$model->save(false);
			return $model;
		}
		$model = new CalculateDoor;
		$model->load(Yii::$app->request->post(), '');

		return $model->save() ? $model : ['errors' => array_values($model->errors)];
	}

    protected function findDoor($id)
    {
        if (($model = CalculateDoor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findWindow($id)
    {
        if (($model = CalculateWindow::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}