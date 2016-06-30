<?php

use yii\bootstrap\Nav;


$items = [];

$items[] = ['label' => Yii::t('app', 'Site Orders') // Количество покупок на сайте
			.
			($siteOrdersCount >= 1 ?
				(' <span class="badge">' . $siteOrdersCount . '</span>')
				:
				''), 'url' => ['/orders'], 'active' => Yii::$app->controller->id == 'orders'];

$items[] = ['label' => Yii::t('app', 'Window Orders') // Количество заказов на окна
			.
			($windowOrdersCount >= 1 ?
				(' <span class="badge">' . $windowOrdersCount . '</span>')
				:
				''), 'url' => ['/window-orders'], 'active' => Yii::$app->controller->id == 'window-orders'];

$items[] = ['label' => Yii::t('app', 'Door Orders') // Количество заказов на двери
			.
			($doorOrdersCount >= 1 ?
				(' <span class="badge">' . $doorOrdersCount . '</span>')
				:
				''), 'url' => ['/door-orders'], 'active' => Yii::$app->controller->id == 'door-orders'];


?>

<?=Nav::widget([
	'options' => ['class' => 'nav nav-tabs'],
	'items' => $items,
	'encodeLabels' => false
])?>