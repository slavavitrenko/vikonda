<?php

use yii\bootstrap\Nav;

$items = [];


if(!Yii::$app->user->isGuest){
	if(Yii::$app->user->identity->type == 'admin'){
		$items[] = ['label' => Yii::t('app', 'Products'), 'url' => ['/products/index'], 'active' => Yii::$app->controller->id == 'products'];
		$items[] = ['label' => Yii::t('app', 'Categories'), 'url' => ['/categories/index'], 'active' => Yii::$app->controller->id == 'categories'];
		$items[] = ['label' => Yii::t('app', 'Users'), 'url' => ['/user/admin/index'], 'active' => Yii::$app->controller->id == 'admin'];
	}
}

?>

<?=Nav::widget([
	'activateParents' => true,
	'options' => [
		'class' => 'nav nav-pills nav-stacked',
	],
	'items' => $items
])?>