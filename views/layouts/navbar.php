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
			['label' => Yii::t('app', 'Products'), 'url' => ['/products/index'], 'active' => Yii::$app->controller->id == 'products'],
			['label' => Yii::t('app', 'Categories'), 'url' => ['/categories/index'], 'active' => Yii::$app->controller->id == 'categories'],
			['label' => Yii::t('app', 'Users'), 'url' => ['/user/admin/index'], 'active' => Yii::$app->controller->id == 'admin'],
		],
		];
	}
}
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
	echo Nav::widget([
		'activateParents' => true,
		'options' => ['class' => 'navbar-nav navbar-right'],
		'items' => $items
	]);
	NavBar::end();
?>