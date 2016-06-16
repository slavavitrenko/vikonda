<?php

namespace app\models;

use Yii;
use yii\helpers\Url;
use app\models\Products;

class Categories extends \yii\db\ActiveRecord
{

    public $label;

    public static function tableName()
    {
        return 'categories';
    }

    public function fields(){
        return [
            'id',
            'label' => 'name',
            'child',
        ];
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent'], 'integer'],
            [['parent'], 'default', 'value' => '0'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'parent' => Yii::t('app', 'Parent'),
        ];
    }

    public function getName(){
        return $this->parentCategory ? $this->parentCategory->name . ' -> ' . $this->name : $this->name;
    }

    public function getChild(){
        return $this->hasMany(Categories::className(), ['parent' => 'id']);
    }

    public function getParentCategory(){
        return $this->hasOne(Categories::className(), ['id' => 'parent']);
    }

    public function getParentName(){
        return $this->parentCategory ? $this->parentCategory->name : Yii::t('app', 'Root category');
    }

    public function getProducts(){
        return $this->hasMany(Products::className(), ['category_id' => 'id']);
    }

}
