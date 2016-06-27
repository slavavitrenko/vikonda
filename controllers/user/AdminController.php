<?php

namespace app\controllers\user;

use yii\filters\AccessControl;
use Yii;


class AdminController extends \dektrium\user\controllers\AdminController
{

    use \app\traits\AjaxTrait;

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

    protected function performAjaxValidation($model)
    {
        if (Yii::$app->request->isAjax && !Yii::$app->request->isPjax) {
            if ($model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                echo json_encode(ActiveForm::validate($model));
                Yii::$app->end();
            }
        }
    }

}