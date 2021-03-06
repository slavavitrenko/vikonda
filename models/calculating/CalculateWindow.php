<?php

namespace app\models\calculating;

use Yii;
use app\models\WindowFurniture;
use app\models\WindowProfiles;
use app\models\WindowTypes;
use app\models\WindowGlazes;
use app\models\Regions;
use app\models\Settings;
use yii\helpers\ArrayHelper;
use app\models\user\User;
use app\models\PartnersRegions;


class CalculateWindow extends \yii\db\ActiveRecord
{

	public static function tableName()
	{
		return 'calculate_window';
	}

	public function rules()
	{
		return [
			[['type_id', 'width', 'height', 'profile_id', 'glaze_id', 'furniture_id', 'region_id', 'sum', 'created_at', 'phone', 'fio'], 'required'],
			[['type_id', 'width', 'height', 'profile_id', 'glaze_id', 'furniture_id', 'region_id', 'created_at'], 'integer'],
			[['sum'], 'number'],
			[['calculate_type'], 'string', 'max' => 25],
			[['calculate_type'], 'match', 'pattern' => '/^(calculate|order)$/', 'message' => Yii::t('app', 'Calculate type must be "order" or "calculate"')],
			[['calculate_type'], 'default', 'value' => 'calculate'],
			[['partner_id'], 'default', 'value' => '0'],
			[['email', 'fio', 'phone'], 'string', 'max' => 255],
			[['phone'], 'match', 'pattern' => '/^\+38([0-9]{10})$/'],
			[['email'], 'email'],
			[['type_id'], 'validateType'],
			[['profile_id'], 'validateProfile'],
			[['glaze_id'], 'validateGlaze'],
			[['furniture_id'], 'validateFurniture'],
			[['region_id'], 'validateRegion'],
		];
	}

	public function validateType($attribute, $params){
		if(WindowTypes::findOne($this->type_id) == null){
			$this->addError($attribute, Yii::t('app', '{field} must not be empty', ['field' => Yii::t('app', 'Window Type')]));
		}
	}

	public function validateProfile($attribute, $params){
		if(WindowProfiles::findOne($this->profile_id) == null){
			$this->addError($attribute, Yii::t('app', '{field} must not be empty', ['field' => Yii::t('app', 'Window Profile')]));
		}
	}

	public function validateGlaze($attribute, $params){
		if(WindowGlazes::findOne($this->glaze_id) == null){
			$this->addError($attribute, Yii::t('app', '{field} must not be empty', ['field' => Yii::t('app', 'Window Glaze')]));
		}
	}

	public function validateFurniture($attribute, $params){
		if(WindowFurniture::findOne($this->furniture_id) == null){
			$this->addError($attribute, Yii::t('app', '{field} must not be empty', ['field' => Yii::t('app', 'Window Furniture')]));
		}
	}

	public function validateRegion($attribute, $params){
		if(Regions::findOne($this->region_id) == null){
			$this->addError($attribute, Yii::t('app', '{field} must not be empty', ['field' => Yii::t('app', 'Region')]));
		}
	}

	public function fields(){
		return [
			'phone',
			'fio',
			'email',
			'calculate_id' => function($model){ return $model->id; },
			'type_id' => function($model){ return $model->type->name; },
			'width' => function($model){ return $model->width . ' ' . Yii::t('app', 'см'); },
			'height' => function($model){ return $model->height . ' ' . Yii::t('app', 'см'); },
			'profile_id' => function($model){ return $model->profile->name; },
			'glaze_id' => function($model){ return $model->glaze->name; },
			'furniture_id' => function($model){ return $model->furniture->name; },
			'region_id' => function($model){ return $model->region->name; },
			'sum' => function($model){ return round($model->sum, Settings::get('round') ? 0 : 2); }
		];
	}

	public function attributeLabels()
	{
		return [
			'id' => Yii::t('app', 'ID'),
			'type_id' => Yii::t('app', 'Window Type'),
			'width' => Yii::t('app', 'Window Width'),
			'height' => Yii::t('app', 'Window Height'),
			'profile_id' => Yii::t('app', 'Window Profile'),
			'glaze_id' => Yii::t('app', 'Window Glaze'),
			'furniture_id' => Yii::t('app', 'Window Furniture'),
			'region_id' => Yii::t('app', 'Region'),
			'calculate_type' => Yii::t('app', 'Window Calculate Type'),
			'sum' => Yii::t('app', 'Sum'),
			'created_at' => Yii::t('app', 'Created At'),
			'partner_id' => Yii::t('app', 'Partner'),
			'phone' => Yii::t('app', 'Phone'),
			'fio' => Yii::t('app', 'FIO'),
		];
	}

	public function getFurniture(){
		return $this->hasOne(WindowFurniture::className(), ['id' => 'furniture_id']);
	}

	public function getPartnersRegions(){
		return $this->hasMany(PartnersRegions::className(), ['region_id' => 'region_id']);
	}

    public function getPartners(){
        return $this->hasMany(User::className(), ['id' => 'partner_id'])->via('partnersRegions');
    }

    public function getPartner(){
        return $this->hasOne(User::className(), ['id' => 'partner_id']);
    }

	public function getGlaze(){
		return $this->hasOne(WindowGlazes::className(), ['id' => 'glaze_id']);
	}

	public function getProfile(){
		return $this->hasOne(WindowProfiles::className(), ['id' => 'profile_id']);
	}

	public function getType(){
		return $this->hasOne(WindowTypes::className(), ['id' => 'type_id']);
	}

	public function getRegion(){
		return $this->hasOne(Regions::className(), ['id' => 'region_id']);
	}

	public function beforeValidate(){
		$this->created_at = time();
		$this->sum = $this->calculate();
		$this->notify();
		return parent::beforeValidate();
	}

	private function calculate(){

		$price = 0;
		$price = eval('return '
			.
			str_ireplace(
				[
					"тип",
					"высота",
					"ширина",
					"профиль",
					"стекло",
					"фурнитура",
				],
				[
					$this->type->price,
					$this->height,
					$this->width,
					$this->profile->price,
					$this->glaze->price,
					$this->furniture->price,
				],
				$this->type->formula)
			.
			';');
		
		// Накидываем процент региона
		$price += ($this->region->percent / 100) * $price;
		// Возвращаем округленную стоимость (округленную до целых гривен или нет, в зависимости от настроек)
		return Settings::get('round') ?  round($price + 0.49, 0) : round($price, 2);
	}

    private function notify(){

    	if($this->calculate_type == 'order'){
    		if(($emails = array_values(ArrayHelper::map($this->partners, 'id', 'email'))) != false){
    			foreach($emails as $email){
			        \app\models\Notifications::notify($email, Yii::t('app', 'New window order in your region - {link}', ['link' => \yii\helpers\Url::to(["/window-orders/view", 'id' => $this->id], true)]));
    			}
    		}
    	}
    }

    private function send_email_to_admin(){
    	Yii::$app->mailer->compose()
            ->setTo(Settings::get('admin_email'))
            ->setFrom([Settings::get('bot_email') => 'Bot'])
            ->setTextBody(Yii::t('app', 'New calculate door has submitted'))
            ->send();
    }

}
