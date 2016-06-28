<?php

namespace app\controllers;


use Yii;
use yii\web\Controller;
use app\models\Settings;


class SettingsController extends Controller
{

	public function actionIndex(){
		$model = Settings::findOne(1);
		if($model->load(Yii::$app->request->post()) && $model->save()){
			Yii::$app->session->setFlash('success', Yii::t('app', 'Settings succesfully saved'));
			return $this->refresh();
		}
		return $this->render('index', ['model' => $model]);
	}
}