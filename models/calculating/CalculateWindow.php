<?php

namespace app\models\calculating;

use Yii;
use app\models\WindowFurniture;
use app\models\WindowProfiles;
use app\models\WindowTypes;
use app\models\WindowGlazes;
use app\models\Regions;
use app\models\Settings;


class CalculateWindow extends \yii\db\ActiveRecord
{

	public static function tableName()
	{
		return 'calculate_window';
	}

	public function rules()
	{
		return [
			[['type_id', 'width', 'height', 'profile_id', 'glaze_id', 'camers', 'furniture_id', 'region_id', 'sum', 'created_at'], 'required'],
			[['type_id', 'width', 'height', 'profile_id', 'glaze_id', 'camers', 'furniture_id', 'region_id', 'created_at'], 'integer'],
			[['sum'], 'number'],
			[['calculate_type'], 'string', 'max' => 25],
			[['calculate_type'], 'match', 'pattern' => '/^(calculate|order)$/', 'message' => Yii::t('app', 'Calculate type must be "order" or "calculate"')],
			[['calculate_type'], 'default', 'value' => 'calculate']
		];
	}

	public function fields(){
		return [
			'calculate_id' => function($model){ return $model->id; },
			'type_id' => function($model){ return $model->type->name; },
			'width' => function($model){ return $model->width; },
			'height' => function($model){ return $model->height; },
			'profile_id' => function($model){ return $model->profile->name; },
			'glaze_id' => function($model){ return $model->glaze->name; },
			'camers',
			'furniture_id' => function($model){ return $model->furniture->name; },
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
			'camers' => Yii::t('app', 'Window Camers'),
			'furniture_id' => Yii::t('app', 'Window Furniture'),
			'region_id' => Yii::t('app', 'Region'),
			'calculate_type' => Yii::t('app', 'Window Calculate Type'),
			'sum' => Yii::t('app', 'Sum'),
			'created_at' => Yii::t('app', 'Created At'),
		];
	}

	public function getFurniture(){
		return $this->hasOne(WindowFurniture::className(), ['id' => 'furniture_id']);
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
		return parent::beforeValidate();
	}

	//==================================================================//
	// =============== Сделать нормальное рассчитывание =============== //
	//==================================================================//
	private function calculate(){
		$price = 0;

		// Квадратура
		$price += (($this->height * $this->width)/1000000) * $this->type->price;

		// Фурнитура
		$price += $this->furniture->price;

		// Стеклопакет
		$price += (($this->height * $this->width)/1000000) * $this->glaze->price;

		// Профиль
		$price += (($this->height + $this->width)/500) * $this->profile->price;

		// Накидываем процент региона
		$price += ($this->region->percent / 100) * $price;

		if($this->calculate_type == 'order'){
			$this->send_email();
		}
		
		// Возвращаем округленную стоимость (округленную до целых гривен или нет, в зависимости от настроек)
		return Settings::get('round') ?  round($price + 0.49, 0) : round($price, 2);
	}

    private function send_email(){
        Yii::$app->mailer->compose()
            ->setTo(Settings::get('admin_email'))
            ->setFrom(['noreply@' . $_SERVER['HTTP_HOST'] => 'Bot'])
            ->setTextBody(Yii::t('app', 'New calculate window has submitted'))
            ->send();
    }

}
