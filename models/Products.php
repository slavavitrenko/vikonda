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
            [['category_id', 'name', 'description', 'price'], 'required'],
            [['category_id', 'created_at'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            ['created_at', 'default', 'value' => time()],
            [['images'], 'file', 'maxFiles' => 10, 'skipOnEmpty' => true, 'extensions' => 'gif, jpg, png'],
            ['price', 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'images' => Yii::t('app', 'Images'),
            'price' => Yii::t('app', 'Price')
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