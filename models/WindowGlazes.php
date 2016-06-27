<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "window_glazes".
 *
 * @property integer $id
 * @property string $name
 * @property string $price
 */
class WindowGlazes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'window_glazes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
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
            'price' => Yii::t('app', 'Price'),
        ];
    }
}
