<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "window_profiles".
 *
 * @property integer $id
 * @property string $name
 * @property string $picture
 * @property string $price
 */
class WindowProfiles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'window_profiles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'picture', 'price'], 'required'],
            [['picture'], 'file'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 255],
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
            'picture' => Yii::t('app', 'Picture'),
            'price' => Yii::t('app', 'Price'),
        ];
    }

    public function beforeDelete(){
        @unlink($this->picture);
        return parent::beforeDelete();
    }
}
