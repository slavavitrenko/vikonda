<?php

namespace app\models;

use Yii;
use app\models\Categories;
use app\models\Pictures;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $description
 * @property integer $created_at
 */
class Products extends \yii\db\ActiveRecord
{

    public $images;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'description', 'price', 'manufacturer'], 'required'],
            [['category_id', 'created_at', 'views'], 'integer'],
            [['description', 'manufacturer'], 'string'],
            [['name'], 'string', 'max' => 255],
            ['created_at', 'default', 'value' => time()],
            [['images'], 'file', 'maxFiles' => 10, 'skipOnEmpty' => true, 'extensions' => 'gif, jpg, png'],
            ['price', 'number'],
            [['views'], 'default', 'value' => '0'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'price' => Yii::t('app', 'Price'),
            'images' => Yii::t('app', 'Images'),
            'category_id' => Yii::t('app', 'Category'),
            'created_at' => Yii::t('app', 'Created At'),
            'description' => Yii::t('app', 'Description'),
            'manufacturer' => Yii::t('app', 'Manufacturer'),
        ];
    }

    public function getCategory(){
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    public function getPictures(){
        return $this->hasMany(Pictures::className(), ['product_id' => 'id']);
    }

    public function getPicCount(){
        return Pictures::find()->select('id')->where(['product_id' => $this->id])->count();
    }

    public function beforeDelete(){
        if($this->pictures){
            foreach($this->pictures as $picture){
                $picture->delete();
            }
        }
        return parent::beforeDelete();
    }

}