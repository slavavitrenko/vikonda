<?php

use kartik\sidenav\SideNav;

$items = [];


if(!Yii::$app->user->isGuest){
	if(Yii::$app->user->identity->type == 'admin'){
		$items[] = ['label' => Yii::t('app', 'Orders')
		.
		(($count = \app\models\Orders::find()->where(['<>', 'region_id', '0'])->count()) >= 1 ?
			(' <span class="badge pull-right">' . $count . '</span>')
			:
			''), 'url' => ['/orders/index'], 'active' => Yii::$app->controller->id == 'orders'];
		// $items[] = ['label' => Yii::t('app', 'Partners'), 'url' => ['/partners/index'], 'active' => Yii::$app->controller->id == 'partners'];
		$items[] = ['label' => Yii::t('app', 'Settings'), 'items' => [
			['label' => Yii::t('app', 'Regions'), 'url' => ['/regions/index'], 'active' => Yii::$app->controller->id == 'regions'],
			['label' => Yii::t('app', 'Products'), 'url' => ['/products/index'], 'active' => Yii::$app->controller->id == 'products'],
			['label' => Yii::t('app', 'Categories'), 'url' => ['/categories/index'], 'active' => Yii::$app->controller->id == 'categories'],
			['label' => Yii::t('app', 'All users'), 'url' => ['/user/admin/index'], 'active' => Yii::$app->controller->id == 'admin'],	
		]];

		$items[] = ['label' => Yii::t('app', 'Windows'), 'items' => [
				['label' => Yii::t('app', 'Window types'), 'url' => ['/window-types'], 'active' => Yii::$app->controller->id == 'window-types'],
				['label' => Yii::t('app', 'Profiles'), 'url' => ['/window-profiles'], 'active' => Yii::$app->controller->id == 'window-profiles'],
				['label' => Yii::t('app', 'Glazes'), 'url' => ['/window-glazes'], 'active' => Yii::$app->controller->id == 'window-glazes'],
				['label' => Yii::t('app', 'Furniture'), 'url' => ['/window-furniture'], 'active' => Yii::$app->controller->id == 'window-furniture'],
		]];

		$items[] = ['label' => Yii::t('app', 'Doors'), 'items' => [
			['label' => Yii::t('app', 'Door Types'), 'url' => ['/door-types'], 'active' => Yii::$app->controller->id == 'door-types'],
		]];

	}
}

?>

<?=SideNav::widget([
	'activateParents' => false,
	'encodeLabels' => false,
	'options' => [
		'class' => 'nav nav-pills nav-stacked',
		'id' => 'main-navbar',
	],
	'items' => $items
])?>
