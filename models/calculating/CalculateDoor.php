<?php

namespace app\models\calculating;

use Yii;
use app\models\Regions;
use app\models\DoorTypes;
use app\models\Settings;
use yii\helpers\ArrayHelper;
use app\models\user\User;
use app\models\PartnersRegions;
use app\models\DoorFurniture;


class CalculateDoor extends \yii\db\ActiveRecord
{

	public static function tableName()
	{
		return 'calculate_door';
	}

	public function rules()
	{
		return [
			[['type_id', 'width', 'height', 'box', 'jamb', 'locker', 'furniture_id', 'region_id', 'sum', 'created_at', 'phone', 'fio'], 'required'],
			[['type_id', 'width', 'height', 'box', 'jamb', 'locker', 'furniture_id', 'region_id', 'created_at'], 'integer'],
			[['sum'], 'number'],
			[['calculate_type'], 'string', 'max' => 25],
			[['calculate_type'], 'match', 'pattern' => '/^(calculate|order)$/', 'message' => Yii::t('app', 'Calculate type must be "order" or "calculate"')],
			[['calculate_type'], 'default', 'value' => 'calculate'],
			[['partner_id'], 'default', 'value' => '0'],
			[['email', 'fio', 'phone'], 'string', 'max' => 255],
			[['phone'], 'match', 'pattern' => '/^\+38([0-9]{10})$/'],
			[['email'], 'email'],
		];
	}

	public function fields(){
		return [
			'fio',
			'email',
			'phone',
			'calculate_id' => function($model){ return $model->id; },
			'type_id' => function($model){ return $model->type->name; },
			'width' => function($model){ return $model->width . ' ' . Yii::t('app', 'см.'); },
			'height' => function($model){ return $model->height . ' ' . Yii::t('app', 'см.'); },
			'box' => function($model){ return Yii::t('app', $model->box ? 'Yeap' : 'Nope'); },
			'jamb' => function($model){ return Yii::t('app', $model->jamb ? 'Yeap' : 'Nope'); },
			'locker' => function($model){ return Yii::t('app', $model->locker ? 'Yeap' : 'Nope'); },
			'furniture_id' => function($model){ return $model->furniture->name; },
			'region_id' => function($model){ return $model->region->name; },
			'sum' => function($model){ return round($model->sum, Settings::get('round') ? 0 : 2);},
		];
	}

	public function attributeLabels()
	{
		return [
			'id' => Yii::t('app', 'ID'),
			'type_id' => Yii::t('app', 'Door Type'),
			'width' => Yii::t('app', 'Door Width'),
			'height' => Yii::t('app', 'Door Height'),
			'box' => Yii::t('app', 'Door Box'),
			'jamb' => Yii::t('app', 'Door Jamb'),
			'locker' => Yii::t('app', 'Door Locker'),
			'furniture_id' => Yii::t('app', 'Furniture'),
			'region_id' => Yii::t('app', 'Region'),
			'calculate_type' => Yii::t('app', 'Door Calculate Type'),
			'sum' => Yii::t('app', 'Sum'),
			'created_at' => Yii::t('app', 'Created At'),
			'partner_id' => Yii::t('app', 'Partner'),
			'phone' => Yii::t('app', 'Phone'),
			'fio' => Yii::t('app', 'FIO'),
		];
	}

	public function getType(){
		return $this->hasOne(DoorTypes::className(), ['id' => 'type_id']);
	}

	public function getRegion(){
		return $this->hasOne(Regions::className(), ['id' => 'region_id']);
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

    public function getFurniture(){
    	return $this->hasOne(DoorFurniture::className(), ['id' => 'furniture_id']);
    }

	public function beforeValidate(){
		$this->created_at = time();
		$this->sum = $this->calculate();
		$this->notify();
		return parent::beforeValidate();
	}

	//==================================================================//
	// =============== Сделать нормальное рассчитывание =============== //
	//==================================================================//
	private function calculate(){
		$price = 0;
		// Квадратура
		$price += ($this->height * $this->width)/100 * $this->type->price;
		// Короб
		if($this->box){
			$price += round(Settings::get('box_price') * (( $this->width * 2 + $this->width * 2 )/100), 0);
		}
		// Замок
		if($this->locker){
			$price += Settings::get('locker_price');
		}
		// Наличник
		if($this->jamb){
			$price += Settings::get('jamb_price') * (( $this->width * 2 + $this->width * 2 )/100);
		}
		// Накидываем процент региона
		$price += ($this->region->percent / 100) * $price;
		// Возвращаем округленную стоимость (округленную до целых гривен или нет, в зависимости от настроек)
		return Settings::get('round') ? round($price + 0.49, 0) : round($price, 2);
	}

    private function notify(){

    	if($this->calculate_type == 'order'){
    		if(($emails = array_values(ArrayHelper::map($this->partners, 'id', 'email'))) != false){
    			foreach($emails as $email){
    				\app\models\Notifications::notify($email, Yii::t('app', 'New door order in your region - {link}', ['link' => \yii\helpers\Url::to(["/door-orders/view", 'id' => $this->id], true)]));
    			}
    		}
    	}
    }

    private function send_email_to_admin(){
    	Yii::$app->mailer->compose()
            ->setTo(Settings::get('admin_email'))
            ->setFrom([Settings::get('bot_email') => 'Bot'])
            ->setTextBody(Yii::t('app', 'New calculate window has submitted'))
            ->send();
    }

}
