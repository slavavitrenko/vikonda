<?php

namespace app\models;

use Yii;
use app\models\OrdersProducts;
use app\models\Products;
use app\models\Regions;
use app\models\user\User;
use app\models\PartnersRegions;


class Orders extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'orders';
    }

    public function scenarios(){
        return [
            'create' => ['updated_at', 'created_at'],
            'order' => ['fio', 'region_id', 'phone', 'email', 'updated_at', 'created_at'],
        ];
    }

    public function rules()
    {
        return [
            [['phone', 'region_id', 'fio'], 'required'],
            [['partner_id'], 'default', 'value' => 0],
            [['region_id'], 'default', 'value' => 0],
            [['phone'], 'string', 'max' => 13],
            [['email', 'fio'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'default', 'value' => time()],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'fio' => Yii::t('app', 'FIO'),
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

    public function getRegion(){
        return $this->hasOne(Regions::className(), ['id' => 'region_id']);
    }

    public function getPartnersRegions(){
        return $this->hasMany(PartnersRegions::className(), ['region_id' => 'region_id']);
    }

    public function getPartners(){
        return $this->hasMany(User::className(), ['id' => 'partner_id'])->via('partnersRegions');
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

    public function afterSave($insert, $changedAttributes){
        if(($partnerEmails = \yii\helpers\ArrayHelper::map($this->partners, 'id', 'email')) != false){
            foreach($partnerEmails as $email){
                $this->send_email($email);
            }
        }
        parent::afterSave($insert, $changedAttributes);
    }

    private function send_email($email){
        \app\models\Notifications::notify($email, Yii::t('app', 'New order in your region - {link}', ['link' => \yii\helpers\Url::to(["/orders/index"], true)]));
    }

}
