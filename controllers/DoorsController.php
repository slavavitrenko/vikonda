<?php


namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\DoorTypes;
use app\models\DoorFurniture;
use app\models\Regions;


class DoorsController extends Controller
{

	public function init(){
		parent::init();
		Yii::$app->response->format = 'json';
	}
	
	public function actionTypes(){
		return DoorTypes::find()->all();
	}

	public function actionRegions(){
		return Regions::find()->all();
	}

	public function actionFurnitures(){
		return DoorFurniture::find()->all();
	}
}