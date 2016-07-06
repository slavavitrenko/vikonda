<?php
namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;


class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function init(){
        // $this->layout = 'frontend';
        return parent::init();
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionCart(){
        $model = Yii::$app->cart->order;
        $model->scenario = 'order';
        if($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->cart->clean();
            if($model->email != ''){Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Your order succesfully accepted. Check your email'));}
            else{Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Your order succesfully accepted. We call you after few minutes'));}
            return $this->refresh();
        }
        return $this->render(
            'cart',
            [
                'order' => Yii::$app->cart->order,
                'model' => $model,
            ]);
    }

    public function actionSetCount($product_id=null, $count=1)
    {
        if($product_id){Yii::$app->cart->setCount($product_id, $count);}
        return $this->actionCart();
    }
 
    public function actionDeleteFromCart($product_id=null)
    {
        if($product_id){Yii::$app->cart->delete($product_id);}
        return $this->actionCart();
    }

    public function actionCalculate(){
        return $this->render('calculate');
    }

}