<?php

namespace app\models;

use Yii;


class WindowProfiles extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'window_profiles';
    }

    public function rules()
    {
        return [
            [['name', 'picture', 'price'], 'required'],
            [['picture'], 'file'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function fields(){
        return [
            'label' => function($model){ return $model->name; },
            'value' => function($model){ return $model->id; },
            'price',
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'picture' => Yii::t('app', 'Picture'),
            'price' => Yii::t('app', 'Price'),
        ];
    }

    public function beforeDelete(){
        @unlink($this->picture);
        return parent::beforeDelete();
    }
}
