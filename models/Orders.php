<?php

namespace app\models;

use Yii;
use app\models\OrdersProducts;
use app\models\Products;
use app\models\Regions;
use app\models\user\User;


class Orders extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'orders';
    }

    public function scenarios(){
        return [
            'create' => ['updated_at', 'created_at'],
            'order' => ['region_id', 'phone', 'email', 'updated_at', 'created_at'],
        ];
    }

    public function rules()
    {
        return [
            [['phone', 'region_id'], 'required'],
            [['partner_id'], 'default', 'value' => 0],
            [['region_id'], 'default', 'value' => 0],
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
            'region_id' => Yii::t('app', 'Region'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_at' => Yii::t('app', 'Created At'),
            'amount' => Yii::t('app', 'Amount'),
            'partner_id' => Yii::t('app', 'Status'),
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

    public function getPartner(){
        return $this->hasOne(User::className(), ['id' => 'partner_id']);
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

    public function getRegion(){
        return $this->hasOne(Regions::className(), ['id' => 'region_id']);
    }

}
