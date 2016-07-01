<?php

namespace app\commands;


use Yii;
use yii\helpers\Url;
use app\models\Settings;
use \yii\console\Controller;
use app\models\Notifications;


class NotifyController extends Controller
{
	public function actionIndex(){
		if(($entries = Notifications::find()->all()) != false){
			foreach($entries as $entry){
				Yii::$app->mailer->compose()
		            ->setTo($entry->email)
		            ->setSubject('Новый заказ н сайте - ' . Settings::get('site_url'))
		            ->setFrom([Settings::get('bot_email') => 'Bot'])
		            ->setTextBody($entry->text)
		            ->send();
				$entry->delete();
			}
		}
	}
}