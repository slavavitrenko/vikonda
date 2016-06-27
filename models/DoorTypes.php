<?php

namespace app\models;

use Yii;


class DoorTypes extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'door_types';
    }

    public function rules()
    {
        return [
            [['name', 'description', 'picture', 'price'], 'required'],
            [['picture'], 'file'],
            [['price'], 'number'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'picture' => Yii::t('app', 'Picture'),
            'price' => Yii::t('app', 'Price'),
        ];
    }

    public function beforeDelete(){
        @unlink($this->picture);
        return parent::beforeDelete();
    }
}
