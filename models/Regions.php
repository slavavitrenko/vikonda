<?php

namespace app\models;

use Yii;
use app\models\Partners;


class Regions extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'regions';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Region'),
        ];
    }

    public function getPartners(){
        return $this->hasMany(Partners::className(), ['id' => 'partner_id'])->viaTable('partners_regions', ['region_id' => 'id']);
    }
}
