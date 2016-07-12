<?php

namespace app\models;
use yii\helpers\Html;

use Yii;

class Settings extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'settings';
    }

    public function rules()
    {
        return [
            [['box_price', 'locker_price', 'round', 'admin_email'], 'required'],
            [['box_price', 'locker_price', 'jamb_price'], 'number'],
            [['admin_email', 'bot_email', 'site_url', 'admin_phone', 'about_page', 'address'], 'string', 'max' => 255],
            [['round'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'box_price' => Yii::t('app', 'Box Price'),
            'locker_price' => Yii::t('app', 'Locker Price'),
            'round' => Yii::t('app', 'Round Prices'),
            'jamb_price' => yii::t('app', 'Jamb Price'),
            'admin_email' => Yii::t('app', 'Notifications email'),
            'bot_email' => Yii::t('app', 'Bot Email'),
            'site_url' => Yii::t('app', 'Site Url'),
            'admin_phone' => Yii::t('app', 'Admin Phone'),
            'about_page' => Yii::t('app', 'About Page'),
            'address' => Yii::t('app', 'Address (in navbar)'),
        ];
    }

    static public function get($option){
        return Settings::find()->select([$option])->one()->$option;
    }
}
