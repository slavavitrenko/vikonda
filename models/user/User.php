<?php

namespace app\models\user;
use Yii;
use app\models\Regions;
use app\models\PartnersRegions;

class User extends \dektrium\user\models\User {

    public $_regions;

	public function scenarios()
    {
        $scenarios = parent::scenarios();
        // add type to scenarios
        $scenarios['create'][]      = 'type';
        $scenarios['update'][]      = 'type';
        $scenarios['register'][]    = 'type';
        $scenarion['create'][]      = 'regions';
        $scenarion['update'][]      = 'regions';
        $scenarion['register'][]    = 'regions';
        return $scenarios;
    }

    public function rules()
    {
        $rules = parent::rules();
        // add some rules
        $rules['typeRequired'] = ['type', 'required'];
        $rules['typeLength']   = ['type', 'match', 'pattern' => '/^(admin|manager|partner)$/', 'message' => Yii::t('app', 'Chosed wrong acount type')];

        // $rules['regionsRequired'] = ['regions', 'required', 'when' => function($model){return $model->type == 'partner'; },
        //     'whenClient' => 'function(attribute, value){ return $("input[name=\'User[type]\']:checked").val() == "partner";}'];
        $rules['reigonsSafe'] = ['regions' ,'safe'];

        return $rules;
    }

    public function attributeLabels(){
    	$labels = parent::attributeLabels();
        $labels['type'] = \Yii::t('app', 'Account type');
        $labels['regions'] = \Yii::t('app', 'Regions');
    	return $labels;
    }

    public function getRegions(){
        return $this->hasMany(Regions::className(), ['id' => 'region_id'])->viaTable('partners_regions', ['partner_id' => 'id']);
    }

    public function setRegions($regions){
        $this->_regions = $regions;
        return true;
    }

    public function afterSave($insert, $changedAttributes){
        PartnersRegions::deleteAll(['partner_id' => $this->id]);
        if($this->_regions && $this->type == 'partner'){
            foreach($this->_regions as $region){
                $model = new PartnersRegions;
                $model->partner_id = $this->id;
                $model->region_id = $region;
                $model->save();
            }
        }
        return parent::afterSave($insert, $changedAttributes);
    }
}