<?php

namespace app\components;

use app\models\Orders;
use app\models\OrdersProducts;
use Yii;

class Cart extends \yii\base\Component
{

	private $_order;
	const SESSION_KEY = 'order_id';

	public function add($productId, $count)
	{
		$link = OrdersProducts::findOne(['product_id' => $productId, 'order_id' => $this->order->id]);
		if (!$link) {
			$link = new OrdersProducts();
		}
		$link->product_id = $productId;
		$link->order_id = $this->order->id;
		$link->count += $count;
		return $link->save();
	}

	public function createOrder()
	{
		$order = new Orders();
		if ($order->save()) {
			$this->_order = $order;
			return true;
		}
		return false;
	}

	private function getOrderId()
	{
		if (!Yii::$app->session->has(self::SESSION_KEY)) {
			if ($this->createOrder()) {
				Yii::$app->session->set(self::SESSION_KEY, $this->_order->id);
			}
		}
		return Yii::$app->session->get(self::SESSION_KEY);
	}

	public function getOrder()
	{
		if ($this->_order == null) {
			$this->_order = Orders::findOne(['id' => $this->getOrderId()]);
		}
		return $this->_order;
	}

	public function delete($productId)
	{
		$link = OrdersProducts::findOne(['product_id' => $productId, 'order_id' => $this->getOrderId()]);
		if (!$link) {
			return false;
		}
		return $link->delete();
	}

	public function setCount($productId, $count)
	{
		$link = OrdersProducts::findOne(['product_id' => $productId, 'order_id' => $this->getOrderId()]);
		if (!$link) {
			return false;
		}
		$link->count = $count;
		return $link->save();
	}

	public function isEmpty()
	{
	    if (!Yii::$app->session->has(self::SESSION_KEY)) {
	        return true;
	    }
	    return $this->order->productsCount ? false : true;
	}

	public function getStatus()
	{
	    if ($this->isEmpty()) {
	        return Yii::t('app', 'В корзине пусто');
	    }
	    return Yii::t('app', 'В корзине {productsCount, number} {productsCount, plural, one{товар} few{товара} many{товаров} other{товара}} на сумму {amount} грн.', [
	        'productsCount' => $this->order->productsCount,
	        'amount' => $this->order->amount
	    ]);
	}

	public function clean()
	{
	    Yii::$app->session->remove(self::SESSION_KEY);
	}
}