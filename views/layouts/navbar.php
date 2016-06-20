<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

?>

<?php
$items = [];

if(!Yii::$app->user->isGuest){
	if(Yii::$app->user->identity->type == 'admin'){
		$items[] = ['label' => Yii::t('app', 'Dashboard'), 'url' => ['/products/index'],
		'items' => [
			['label' => Yii::t('app', 'Orders'), 'url' => ['/orders/index'], 'active' => Yii::$app->controller->id == 'orders'],
			// ['label' => Yii::t('app', 'Partners'), 'url' => ['/partners/index'], 'active' => Yii::$app->controller->id == 'partners'],
			['label' => Yii::t('app', 'Regions'), 'url' => ['/regions/index'], 'active' => Yii::$app->controller->id == 'regions'],
			['label' => Yii::t('app', 'Products'), 'url' => ['/products/index'], 'active' => Yii::$app->controller->id == 'products'],
			['label' => Yii::t('app', 'Categories'), 'url' => ['/categories/index'], 'active' => Yii::$app->controller->id == 'categories'],
			['label' => Yii::t('app', 'All users'), 'url' => ['/user/admin/index'], 'active' => Yii::$app->controller->id == 'admin'],
		],
		];
	}
}

$items[] = ['label' => '<i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;'
.
Yii::$app->cart->status
, 'url' => ['/site/cart'], 'linkOptions' => ['style' => 'color:yellow', 'data-pjax' => 0]];

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