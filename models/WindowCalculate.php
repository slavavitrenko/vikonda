<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "window_calculate".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $city
 * @property string $profile_type
 * @property string $window_type
 * @property string $height
 * @property string $width
 * @property string $opening_type
 */
class WindowCalculate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'window_calculate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'city', 'profile_type', 'window_type', 'height', 'width', 'opening_type'], 'required'],
            [['name', 'city', 'profile_type', 'window_type', 'opening_type'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 25],
            [['height', 'width'], 'string', 'max' => 20],
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
            'phone' => Yii::t('app', 'Phone'),
            'city' => Yii::t('app', 'City'),
            'profile_type' => Yii::t('app', 'Profile Type'),
            'window_type' => Yii::t('app', 'Window Type'),
            'height' => Yii::t('app', 'Height'),
            'width' => Yii::t('app', 'Width'),
            'opening_type' => Yii::t('app', 'Opening Type'),
        ];
    }
}
