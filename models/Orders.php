<?php

namespace app\models;

use Yii;
use app\models\OrdersProducts;


class Orders extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'orders';
    }

    public function rules()
    {
        return [
            [['phone'], 'string', 'max' => 13],
            [['email'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'default', 'value' => time()],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    public function getProducts(){
        return $this->hasMany(OrdersProducts::className(), ['order_id' => 'id']);
    }

    public function getProductsCount(){
        $totalCount = 0;
        if($products = $this->products){
            foreach($products as $product){
                $totalCount += $product->count;
            }
        }
        return $totalCount;
    }

    public function beforeDelete(){
        if($products = $this->products){
            foreach($products as $product){
                $product->delete();
            }
        }
        return parent::beforeDelete();
    }

    public function getAmount(){
        $totalAmount = 0;
        if($products = $this->products){
            foreach($products as $product){
                $totalAmount += $product->getPrice() * $product->count;
            } 
        }
        return $totalAmount;
    }

}
