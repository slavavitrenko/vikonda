<?php

namespace app\models;

use Yii;
use yii\helpers\Url;
use app\models\Products;

class Categories extends \yii\db\ActiveRecord
{

    public $label;

    public $image;

    public static function tableName()
    {
        return 'categories';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent', 'visible'], 'integer'],
            [['parent'], 'default', 'value' => '0'],
            [['name', 'picture'], 'string', 'max' => 255],
            [['name'], 'validateExist'],
            [['visible'], 'default', 'value' => 1],
            [['image'], 'file'],
        ];
    }

    public function validateExist($attribute, $params){
        if($this->isNewRecord){
            if(Categories::find()->where(['name' => $this->name])->andWhere(['parent' => $this->parent])->asArray()->one()){
                $this->addError('name', Yii::t('app', 'Category already exist'));
            }
        }
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'parent' => Yii::t('app', 'Parent'),
            'image' => Yii::t('app', 'Picture'),
            'picture' => Yii::t('app', 'Picture'),
            'visible' => Yii::t('app', 'Visible'),
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

    public function beforeDelete(){
        parent::beforeDelete();
        if($this->child){
            foreach($this->child as $child){
                $child->delete();
            }
        }
        // if($this->products){
        //     foreach($this->products as $product){
        //         $product->delete();
        //     }
        // }
        if(!empty($this->picture)){
            @unlink($this->picture);
        }

        return true;
    }

    public function afterSave($insert, $changerAttributes){
        if($childs = $this->child){
            foreach($childs as $child){
                $child->visible = $this->visible;
                $child->save();
            }
        }
        return parent::afterSave($insert, $changerAttributes);
    }

    static public function getCatItems(){
        $items = [];
        $cats = self::find()->where(['parent' => '0', 'visible' => '1'])->all();
        foreach($cats as $cat){
            $item = ['label' => $cat->name];
            if($cat->child){
                $item['items'] = self::getRecursive($cat->id);
            }
            else{
                $item['url'] = ['/products/category/', 'id' => $cat->id];
            }
            $items[] = $item;
        }
        return $items;
    }

    private static function getRecursive($cat_id){
        $items = [];
        $cats = self::find()->where(['visible' => '1', 'parent' => $cat_id])->all();

        if($cats){
            foreach($cats as $cat){
                $item = ['label' => $cat->name];
                if($cat->child){
                    $item['items'] = self::getRecursive($cat->id);
                }
                else{
                    $item['url'] = ['/products/category/', 'id' => $cat->id];
                }
                $items[] = $item;
            }
        }
        return empty($items) ? null : $items;
    }

}