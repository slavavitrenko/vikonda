<?php

namespace app\models\user;
use Yii;

class User extends \dektrium\user\models\User {
	
    public $type;
    
	public function scenarios()
    {
        $scenarios = parent::scenarios();
        // add type to scenarios
        $scenarios['create'][]   = 'type';
        $scenarios['update'][]   = 'type';
        $scenarios['register'][] = 'type';
        return $scenarios;
    }

    public function rules()
    {
        $rules = parent::rules();
        // add some rules
        $rules['typeRequired'] = ['type', 'required'];
        $rules['typeLength']   = ['type', 'match', 'pattern' => '/^(admin|manager|partner)$/', 'message' => Yii::t('app', 'Chosed wrong acount type')];

        return $rules;
    }

    public function attributeLabels(){
    	$labels = parent::attributeLabels();
        $labels['type'] = \Yii::t('app', 'Account type');
    	return $labels;
    }
}