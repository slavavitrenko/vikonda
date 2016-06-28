<?php

namespace app\models;

use Yii;


class WindowGlazes extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'window_glazes';
    }

    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function fields(){
        return [
            'label' => function($model){  return $model->name; },
            'value' => function($model){  return $model->id; },
            'price'
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'price' => Yii::t('app', 'Price'),
        ];
    }
}
