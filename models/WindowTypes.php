<?php

namespace app\models;

use Yii;


class WindowTypes extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'window_types';
    }

    public function rules()
    {
        return [
            [['name', 'description', 'price', 'formula'], 'required'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['name', 'formula'], 'string', 'max' => 255],
            [['picture'], 'file']
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
            'price' => Yii::t('app', 'Price per quadmeter'),
            'formula' => Yii::t('app', 'Formula'),
        ];
    }

    public function beforeDelete(){
        @unlink($this->picture);
        return parent::beforeDelete();
    }
}
