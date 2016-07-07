<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "door_furniture".
 *
 * @property integer $id
 * @property string $name
 * @property string $price
 */
class DoorFurniture extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'door_furniture';
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

    public function fields(){
        return [
            'value' => function($model){ return $model->id; },
            'label' => function($model){ return $model->name; },
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
