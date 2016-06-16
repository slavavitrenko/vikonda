<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pictures".
 *
 * @property integer $id
 * @property string $path
 * @property integer $product_id
 * @property integer $created_at
 */
class Pictures extends \yii\db\ActiveRecord
{

    public $updated_at;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pictures';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['path', 'product_id'], 'required'],
            [['product_id', 'created_at'], 'integer'],
            [['path'], 'string', 'max' => 255],
            ['created_at', 'default', 'value' => time()],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'path' => Yii::t('app', 'Path'),
            'product_id' => Yii::t('app', 'Product ID'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    public function getSrc(){
        return '/uploads/products/' . $this->path;
    }

    public function beforeDelete(){
        @unlink(Yii::getAlias('@webroot') . '/uploads/products/' . $this->path);
        return parent::beforeDelete();
    }
}
