<?php

namespace app\models;

use Yii;
use app\models\user\User;


class Regions extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'regions';
    }

    public function rules()
    {
        return [
            [['name', 'percent'], 'required'],
            [['percent'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function fields(){
        return [
        'label' => function($model){ return $model->name; },
        'value' => function($model){ return $model->id; },
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Region'),
            'percent' => Yii::t('app', 'Percent'),
            'partners' => Yii::t('app', 'Partners'),
        ];
    }

    public function getPartners(){
        return $this->hasMany(User::className(), ['id' => 'partner_id'])->viaTable('partners_regions', ['region_id' => 'id']);
    }
}
