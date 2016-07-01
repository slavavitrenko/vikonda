<?php

use yii\bootstrap\Nav;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\NavBar;

?>
<div class="header-bar">
    <div class="mail-phone">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="mail-block">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span><a href="mailto:<?=\app\models\Settings::get('admin_email'); ?>"><?=\app\models\Settings::get('admin_email'); ?></a></span>
                    </div>
                    <div class="phone-block">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span><a href="skype:<?=\app\models\Settings::get('admin_phone')?>?call"><?=\app\models\Settings::get('admin_phone')?></a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
$items = [];

if(!Yii::$app->user->isGuest){
        $items[] = ['label' => Yii::t('app', 'Dashboard'), 'url' => ['/orders/index'], 'active' => false];
}

$catItems = [];
foreach(\app\models\Categories::find()->where(['parent' => 18])->andWhere(['visible' => '1'])->all() as $category){
    $catItems[] = ['label' => $category->name, 'url' => Url::to(['/products/index', 'ProductSearch[category_id]' => $category->id])];
}

$items[] = ['label' => '<i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;'
.
Yii::$app->cart->status
, 'url' => ['/site/cart'], 'linkOptions' => ['style' => 'color:yellow', 'class' => Yii::$app->user->isGuest ? '' : ' hidden', 'data-pjax' => 0]];

$items[] = ['label' => Yii::t('app', 'Products'), 'items' => $catItems];

$items[] = ['label' => Yii::t('app', 'Calculator'), 'items' => [
    ['label' => Yii::t('app', 'Calculate Doors'), 'url' => ['/site/calculator']],
    ['label' => Yii::t('app', 'Calculate Windows'), 'url' => ['/site/calculator']],
]];

$items[] = ['label' => Yii::t('app', 'About'), 'url' => ['/site/about']];


$items[] = Yii::$app->user->getIsGuest() ?
    ['label' => Yii::t('app', 'Login'), 'url' => ['/user/login']]
    :
    ['label' => Yii::t('app', 'Logout'), 'url' => ['/user/logout'],
        'linkOptions' => ['data-method' => 'post']
    ];


    NavBar::begin([
        'brandLabel' => Yii::$app->params['siteName'],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default',
        ],
    ]);


    \yii\widgets\Pjax::begin(['id' => 'cart-container', 'timeout' => 1, 'linkSelector' => false]);
    echo Nav::widget([
        'activateParents' => true,
        'encodeLabels' => false,
        'options' => ['class' => 'nav navbar-nav navbar-right'],
        'items' => $items
    ]);
    \yii\widgets\Pjax::end();
    NavBar::end();

?>
</div>