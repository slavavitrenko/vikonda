<?php


namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\DoorTypes;


class DoorsController extends Controller
{
	public function actionTypes(){
		Yii::$app->response->format = 'json';
		return DoorTypes::find()->all();
	}
}