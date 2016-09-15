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
            [['name', 'description', 'picture', 'price', 'formula'], 'required'],
            [['picture'], 'file'],
            [['price'], 'number'],
            [['name', 'description'], 'string', 'max' => 255],
            [['formula'], 'string', 'max' => 500]
        ];
    }

    public function fields(){
        return [
            'label' => function($model){  return $model->name; },
            'value' => function($model){  return $model->id; },
            'price',
            'picture' => function($model){
                return '/' . $model->picture;
            }
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
            'formula' => Yii::t('app', 'Formula')
        ];
    }

    public function beforeDelete(){
        @unlink($this->picture);
        return parent::beforeDelete();
    }
}
