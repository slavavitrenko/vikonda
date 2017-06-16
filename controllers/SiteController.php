<?php
namespace app\controllers;
use app\models\Notifications;
use app\models\Settings;
use app\models\WindowCalculate;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\ActiveDataProvider;
use app\models\Posts;
use yii\web\NotFoundHttpException;

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

    public function actionCalculate(){
        $request = Yii::$app->request;
        if($request->isPost){
            $model = new WindowCalculate();
            if($model->load($request->post()) ){
                if(isset($_POST['rightSideOption'])){
                    if(isset($_POST['leftSideOption'])){
                        if(isset($_POST['topSideOption'])){
                            $model->opening_type = $_POST['leftSideOption'] . ', ' .
                                $_POST['topSideOption'] . ', ' . $_POST['rightSideOption'];
                        }
                        else if(isset($_POST['leftSideOption2'])){
                            $model->opening_type = $_POST['leftSideOption'] . ', ' .
                                $_POST['leftSideOption2'] . ', ' . $_POST['rightSideOption'];
                        }
                        else{
                            $model->opening_type = $_POST['leftSideOption'] . ', ' . $_POST['rightSideOption'];
                        }
                    }
                    else{
                        $model->opening_type = $_POST['rightSideOption'];
                    }
                }
                else{
                    $model->opening_type = Yii::t('app', 'Missing');
                }
                $model->save();
                Notifications::notify(Notifications::notify(Settings::get('admin_email')),
                    'Вам пришёл новый заказ. Тип окна - ' . $model->window_type . ', тип открывания - '
                    . $model->opening_type . 'тип профиля - ' . $model->profile_type . ', высота - '
                    . $model->height . ', ширина - ' . $model->width . ', имя заказчика - ' . $model->name
                    . ', телефона заказчика - ' . $model->phone . ', город - ' . $model->city . '.'
                );
                Yii::$app->session->setFlash('success', Yii::t('app', 'Your order sucessfully saved'));

                
            }
        }
        return $this->redirect(['/site/index']);
    }

    public function actionCall(){
        if(!empty($_POST['name']) && !empty($_POST['phone'])){
            Notifications::notify(Settings::get('admin_email'),
                'Вам пришла заявка на перезвон. Имя - ' . $_POST['name'] . ', телефон - ' . $_POST['phone']
            );
            Yii::$app->session->setFlash('success', Yii::t('app', 'Call saved'));

        } else{
            Yii::$app->session->setFlash('danger', Yii::t('app', 'Fill in the fields name and phone.'));
        }
        return $this->redirect(['/site/index']);
    }

    public function actionView($slug, $lang = 'uk')
    {
        if(false != ($model = Posts::findOne(['slug' => $slug]))){
            return $this->render('view', [
                'model' => $model,
                'lang' => $lang,
            ]);
        }else{
            throw new NotFoundHttpException(Yii::t('app','Post not found'));
        }
    }


    public function actionIndex()
    {
        $model =  new WindowCalculate();
        return $this->render('index', ['model' => $model]);
    }

    public function actionAbout()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'You message was submitted. Thank you.'));
            return $this->refresh();
        }
        return $this->render('about', [
            'model' => $model,
        ]);
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



    public function actionImport(){
        $file = fopen(__DIR__ . '/entries.csv', 'r');
        while (false != $data = fgetcsv($file)){
            $model = new \app\models\Products;
            $model->category_id = 25;
            $model->name = $data[0];
            $model->description = '';
            if(!empty($data[2])){
                $model->description .= str_replace("\n", "<br>", $data[2]) . '<br><br>';
            }
            if(!empty($data[1])){
                $model->description .= "<strong>Характеристики:</strong><br>" . str_replace("\n", "<br>", $data[1]) . "<br><br>";
            }
            if(!empty($data[3])){
                $model->description .= "<strong>Преимущества:</strong><br>" . str_replace("\n", "<br>", $data[3]) . '<br><br>';
            }
            $model->save(false);
        }
        fclose($file);
    }

}
