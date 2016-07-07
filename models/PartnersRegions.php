<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "partners_regions".
 *
 * @property integer $id
 * @property integer $partner_id
 * @property integer $region_id
 */
class PartnersRegions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partners_regions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['partner_id', 'region_id'], 'required'],
            [['partner_id', 'region_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'partner_id' => Yii::t('app', 'Partner ID'),
            'region_id' => Yii::t('app', 'Region ID'),
        ];
    }
}
