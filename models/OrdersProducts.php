<?php

namespace app\models;

use Yii;
use app\models\Products;


class OrdersProducts extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'orders_products';
    }

    public function rules()
    {
        return [
            [['order_id', 'product_id', 'count'], 'required'],
            [['order_id', 'product_id', 'count'], 'integer'],
            [['price'], 'number'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'count' => Yii::t('app', 'Count'),
            'price' => Yii::t('app', 'Price'),
        ];
    }

    public function getProduct(){
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }

    public function getPrice(){
        return $this->product->price;
    }
}