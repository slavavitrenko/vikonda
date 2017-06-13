<?php

use kartik\sidenav\SideNav;

$totalCount = \app\models\Orders::find()->count();
$windowOrdersCount = \app\models\calculating\CalculateWindow::find()->where(['calculate_type' => 'order'])->count();
$doorOrdersCount = \app\models\calculating\CalculateDoor::find()->where(['calculate_type' => 'order'])->count();
$siteOrdersCount = $windowOrdersCount + $doorOrdersCount;

$items = [];

$items[] = ['label' => Yii::t('app', 'Orders').
			($totalCount >= 1 ?
				(' <span class="badge">' . $totalCount . '</span>&nbsp;&nbsp;&nbsp;')
				:
				''), 'items' => [

			['label' => Yii::t('app', 'Site Orders') // Количество покупок на сайте
			.
			($siteOrdersCount >= 1 ?
				(' <span class="badge pull-right">' . $siteOrdersCount . '</span>')
				:
				''), 'url' => ['/orders/index'], 'active' => in_array(Yii::$app->controller->id, ['orders'])],


			['label' => Yii::t('app', 'Window Orders') // Количество заказов на окна
			.
			($windowOrdersCount >= 1 ?
				(' <span class="badge pull-right">' . $windowOrdersCount . '</span>')
				:
				''), 'url' => ['/window-orders'], 'active' => in_array(Yii::$app->controller->id, ['window-orders'])],


			['label' => Yii::t('app', 'Door Orders') // Количество заказов на двери
			.
			($doorOrdersCount >= 1 ?
				(' <span class="badge pull-right">' . $doorOrdersCount . '</span>')
				:
				''), 'url' => ['/door-orders'], 'active' => in_array(Yii::$app->controller->id, ['door-orders'])],
		],
		'active' => in_array(Yii::$app->controller->id, ['orders', 'door-orders', 'window-orders'])];
// $items[] = ['label' => Yii::t('app', 'Partners'), 'url' => ['/partners/index'], 'active' => Yii::$app->controller->id == 'partners'];
$items[] = ['label' => Yii::t('app', 'Settings'), 'items' => [
	['label' => Yii::t('app', 'All users'), 'url' => ['/user/admin'], 'active' => Yii::$app->controller->id == 'admin', 'visible' => Yii::$app->user->identity->type == 'admin'],
	['label' => Yii::t('app', 'Regions'), 'url' => ['/regions'], 'active' => Yii::$app->controller->id == 'regions'],
	['label' => Yii::t('app', 'Products'), 'url' => ['/products'], 'active' => Yii::$app->controller->id == 'products'],
	['label' => Yii::t('app', 'Categories'), 'url' => ['/categories'], 'active' => Yii::$app->controller->id == 'categories'],
	['label' => Yii::t('app', 'Basic Settings'), 'url' => ['/settings'], 'active' => Yii::$app->controller->id == 'settings'],
	['label' => Yii::t('app', 'Settings Seo'), 'url' => ['/settings-seo'], 'active' => Yii::$app->controller->id == 'settings-seo'],
]
, 'active' => in_array(Yii::$app->controller->id, ['admin', 'regions', 'categories', 'products', 'settings'])];

if (!Yii::$app->user->getIsGuest()){
	$items[] = ['label' => Yii::t('app', 'Controlling'), 'url' => '', 'items' => [
		['label' => Yii::t('app', 'Posts add'), 'url' => ['/posts/index']],

		['label' => Yii::t('app', 'Categories'), 'url' => ['/categoriesblog/index']],

		['label' => Yii::t('app', 'Pages'), 'url' => ['/pages/index']],

		['label' => Yii::t('app', 'Help'), 'url' => ['/help/index']],
	]];
}

$items[] = ['label' => Yii::t('app', 'Doors'), 'items' => [
	['label' => Yii::t('app', 'Door Types'), 'url' => ['/door-types'], 'active' => Yii::$app->controller->id == 'door-types'],
	['label' => Yii::t('app', 'Door Furnitures'), 'url' => ['/door-furniture'], 'active' => Yii::$app->controller->id == 'door-furniture'],
]
, 'active' => in_array(Yii::$app->controller->id, ['door-types', 'door-furniture'])];

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
