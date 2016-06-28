<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

?>

<?php
$items = [];

if(!Yii::$app->user->isGuest){
	if(Yii::$app->user->identity->type == 'admin'){
		$items[] = ['label' => Yii::t('app', 'Dashboard'), 'url' => ['/orders/index']];
	}
}

$items[] = ['label' => '<i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;'
.
Yii::$app->cart->status
, 'url' => ['/site/cart'], 'linkOptions' => ['style' => 'color:yellow', 'class' => Yii::$app->user->isGuest ? '' : ' hidden', 'data-pjax' => 0]];

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
			'class' => 'navbar-inverse navbar-fixed-top',
		],
	]);

	\yii\widgets\Pjax::begin(['id' => 'cart-container', 'timeout' => 1, 'linkSelector' => false]);
	echo Nav::widget([
		'activateParents' => true,
		'encodeLabels' => false,
		'options' => ['class' => 'navbar-nav navbar-right'],
		'items' => $items
	]);
	\yii\widgets\Pjax::end();
	NavBar::end();
?>