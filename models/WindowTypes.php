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
            [['name', 'description', 'price', 'picture'], 'required'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 255],
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
            'price' => Yii::t('app', 'Price per meter'),
        ];
    }

    public function beforeDelete(){
        @unlink($this->picture);
        return parent::beforeDelete();
    }
}
