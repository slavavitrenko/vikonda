<?php

namespace app\models;

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
            [['admin_email', 'bot_email', 'site_url'], 'string', 'max' => 255],
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
        ];
    }

    static public function get($option){
        return Settings::findOne(1)->$option;
    }
}
