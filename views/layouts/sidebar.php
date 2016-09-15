<?php

use kartik\sidenav\SideNav;

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
	['label' => Yii::t('app', 'All users'), 'url' => ['/user/admin/index'], 'active' => Yii::$app->controller->id == 'admin', 'visible' => Yii::$app->user->identity->type == 'admin'],	
	['label' => Yii::t('app', 'Regions'), 'url' => ['/regions/index'], 'active' => Yii::$app->controller->id == 'regions'],
	['label' => Yii::t('app', 'Products'), 'url' => ['/products/index'], 'active' => Yii::$app->controller->id == 'products'],
	['label' => Yii::t('app', 'Categories'), 'url' => ['/categories/index'], 'active' => Yii::$app->controller->id == 'categories'],
	['label' => Yii::t('app', 'Basic Settings'), 'url' => ['/settings/index'], 'active' => Yii::$app->controller->id == 'settings'],
]
, 'active' => in_array(Yii::$app->controller->id, ['admin', 'regions', 'categories', 'products', 'settings'])];

$items[] = ['label' => Yii::t('app', 'Windows'), 'items' => [
		['label' => Yii::t('app', 'Window types'), 'url' => ['/window-types'], 'active' => Yii::$app->controller->id == 'window-types'],
		['label' => Yii::t('app', 'Profiles'), 'url' => ['/window-profiles'], 'active' => Yii::$app->controller->id == 'window-profiles'],
		['label' => Yii::t('app', 'Glazes'), 'url' => ['/window-glazes'], 'active' => Yii::$app->controller->id == 'window-glazes'],
		['label' => Yii::t('app', 'Furniture'), 'url' => ['/window-furniture'], 'active' => Yii::$app->controller->id == 'window-furniture'],
]
, 'active' => in_array(Yii::$app->controller->id, ['window-types', 'window-profiles', 'window-glazes', 'window-furniture'])];

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
