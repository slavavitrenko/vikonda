<?php

namespace app\controllers;


use Yii;
use app\models\WindowTypes;
use app\models\WindowProfiles;
use app\models\WindowFurniture;
use app\models\WindowGlazes;
use app\models\Regions;
use yii\web\Controller;


class WindowsController extends Controller
{

	public function actionTypes(){
		Yii::$app->response->format = 'json';
		return WindowTypes::find()->all();
	}

	public function actionProfiles(){
		Yii::$app->response->format = 'json';
		return WindowProfiles::find()->all();
	}

	public function actionFurnitures(){
		Yii::$app->response->format = 'json';
		return WindowFurniture::find()->all();
	}

	public function actionGlazes(){
		Yii::$app->response->format = 'json';
		return WindowGlazes::find()->all();
	}

	public function actionRegions(){
		Yii::$app->response->format = 'json';
		return Regions::find()->all();
	}

}