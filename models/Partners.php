<?php

namespace app\models;

use Yii;
use app\models\Regions;
use app\models\PartnersRegions;


class Partners extends \yii\db\ActiveRecord
{

    public $region;

    public static function tableName()
    {
        return 'partners';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['regions'], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'fName'),
            'region' => Yii::t('app', 'Region')
        ];
    }

    public function getRegions(){
        return $this->hasMany(Regions::className(), ['id' => 'region_id'])->viaTable('partners_regions', ['partner_id' => 'id']);
    }

    public function setRegions($regions=null){
        if(!$regions){return true;}
        if($this->isNewRecord){ $this->save(false); }
        $valid = false;
        PartnersRegions::deleteAll(['partner_id' => $this->id]);
        foreach($regions as $region){
            $link = new PartnersRegions;
            $link->partner_id = $this->id;
            $link->region_id = $region;
            $valid = $link->save(false) && $valid;
        }
        if($this->isNewRecord){
            if(!$valid){
                $this->delete();
            }
        }
        return true;
    }

    public function beforeDelete(){
        parent::beforeDelete();
        foreach($this->regions as $region){
            $region->delete();
        }
    }

}