<?php

namespace app\traits;

use Yii;
use yii\helpers\Url;
use yii\base\Model;
use yii\web\Response;
use yii\widgets\ActiveForm;


trait AjaxTrait
{

	public function render($view, $params = [])
    {
        if(Yii::$app->request->isAjax){
            return \app\widgets\Alert::widget() . $this->getView()->renderAjax($view, $params, $this) . '<span class="hidden main-title">' . $this->view->title . '</span>';
        }
        else{
            $content = $this->getView()->render($view, $params, $this);
            return $this->renderContent($content);
        }
    }

	protected function performAjaxValidation(Model $model)
    {
        if (Yii::$app->request->post('ajax') && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            echo json_encode(ActiveForm::validate($model));
            Yii::$app->end();
        }
    }

    public function redirect($url, $statusCode = 302)
    {
        Yii::$app->response->format = 'json';
        if(Yii::$app->request->isAjax){
            Yii::$app->getResponse()->setStatusCode(201);
            return Url::to($url);
        }
        else {
            return Yii::$app->getResponse()->redirect(Url::to($url), $statusCode);
        }
    }

    public function refresh($anchor = '')
    {
        return $this->redirect(Yii::$app->getRequest()->getUrl() . $anchor);
    }

}