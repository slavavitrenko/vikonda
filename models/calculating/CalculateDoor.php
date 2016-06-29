<?php

namespace app\models\calculating;

use Yii;
use app\models\Regions;
use app\models\DoorTypes;
use app\models\Settings;


class CalculateDoor extends \yii\db\ActiveRecord
{

	public static function tableName()
	{
		return 'calculate_door';
	}

	public function rules()
	{
		return [
			[['type_id', 'width', 'height', 'box', 'jamb', 'locker', 'region_id', 'sum', 'created_at'], 'required'],
			[['type_id', 'width', 'height', 'box', 'jamb', 'locker', 'region_id', 'created_at'], 'integer'],
			[['sum'], 'number'],
			[['calculate_type'], 'string', 'max' => 25],
			[['calculate_type'], 'match', 'pattern' => '/^(calculate|order)$/', 'message' => Yii::t('app', 'Calculate type must be "order" or "calculate"')],
			[['calculate_type'], 'default', 'value' => 'calculate'],
		];
	}

	public function fields(){
		return [
			'calculate_id' => function($model){ return $model->id; },
			'width',
			'height',
			'box',
			'jamb',
			'locker',
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
			'region_id' => Yii::t('app', 'Region'),
			'calculate_type' => Yii::t('app', 'Door Calculate Type'),
			'sum' => Yii::t('app', 'Sum'),
			'created_at' => Yii::t('app', 'Created At'),
		];
	}

	public function getType(){
		return $this->hasOne(DoorTypes::className(), ['id' => 'type_id']);
	}

	public function getRegion(){
		return $this->hasOne(Regions::className(), ['id' => 'region_id']);
	}

	public function beforeValidate(){
		$this->created_at = time();
		$this->sum = $this->calculate();
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

		$this->send_email(Settings::get('admin_email'));

		// Возвращаем округленную стоимость (округленную до целых гривен или нет, в зависимости от настроек)
		return Settings::get('round') ? round($price + 0.49, 0) : round($price, 2);
	}

	private function send_email($email){
		Yii::$app->mailer->compose()
			->setTo($email)
			->setFrom(['noreply@' . $_SERVER['HTTP_HOST'] => 'Bot'])
			->setTextBody(Yii::t('app', 'New calculate door has submitted'))
			->send();
	}

}
