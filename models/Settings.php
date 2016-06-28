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
            [['box_price', 'locker_price', 'round'], 'required'],
            [['box_price', 'locker_price', 'jamb_price'], 'number'],
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
        ];
    }

    static public function get($option){
        return Settings::findOne(1)->$option;
    }
}
