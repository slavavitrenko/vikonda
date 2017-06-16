<?php

namespace app\components;


class OrdersCount extends \yii\base\Component
{
	public static function count(){

		// Считаем количество необработанных заказов
		$siteOrders = \app\models\Orders::find()->where(['<>', 'region_id', '0'])->andWhere(['partner_id' => '0']);
		if(\Yii::$app->user->identity->type == 'partner'){
			$siteOrders->andWhere(['region_id' => array_values(\yii\helpers\ArrayHelper::map(\Yii::$app->user->identity->regions, 'id', 'id'))]);
		}
		$siteOrdersCount = $siteOrders->count();

		$windowOrders = \app\models\calculating\CalculateWindow::find()->where(['partner_id' => '0', 'calculate_type' => 'order']);
		if(\Yii::$app->user->identity->type == 'partner'){
			$windowOrders->andWhere(['region_id' => array_values(\yii\helpers\ArrayHelper::map(\Yii::$app->user->identity->regions, 'id', 'id'))]);
		}
		$windowOrdersCount = $windowOrders->count();

		$doorOrders = \app\models\calculating\CalculateDoor::find()->where(['partner_id' => '0', 'calculate_type' => 'order']);
		if(\Yii::$app->user->identity->type == 'partner'){
			$doorOrders->andWhere(['region_id' => array_values(\yii\helpers\ArrayHelper::map(\Yii::$app->user->identity->regions, 'id', 'id'))]);
		}
		$doorOrdersCount = $doorOrders->count();

		$totalCount = $siteOrdersCount + $windowOrdersCount + $doorOrdersCount;

		return [
			'siteOrdersCount' => $siteOrdersCount,
			'windowOrdersCount' => $windowOrdersCount,
			'doorOrdersCount' => $doorOrdersCount,
			'totalCount' => $totalCount,
		];
	}
}