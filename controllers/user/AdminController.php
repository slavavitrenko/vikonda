<?php

namespace app\controllers\user;

use yii\filters\AccessControl;
use Yii;


class AdminController extends \dektrium\user\controllers\AdminController{

	public function behaviors(){
		return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return Yii::$app->user->identity->type == 'admin';
                        },
                    ],
                ],
            ],
		];
	}

}