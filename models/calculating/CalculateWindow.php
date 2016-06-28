<?php

namespace app\models\calculating;

use Yii;
use app\models\WindowFurniture;
use app\models\WindowProfiles;
use app\models\WindowTypes;
use app\models\WindowGlazes;
use app\models\Regions;
use app\models\Settings;

/**
 * This is the model class for table "calculate_window".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $width
 * @property integer $height
 * @property integer $profile
 * @property integer $glaze
 * @property integer $camers
 * @property integer $furniture
 * @property integer $region
 * @property string $calculate_type
 * @property integer $sum
 * @property integer $created_at
 */
class CalculateWindow extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'calculate_window';
    }

    public function rules()
    {
        return [
            [['type_id', 'width', 'height', 'profile_id', 'glaze_id', 'camers', 'furniture_id', 'region_id', 'calculate_type', 'sum', 'created_at'], 'required'],
            [['type_id', 'width', 'height', 'profile_id', 'glaze_id', 'camers', 'furniture_id', 'region_id', 'created_at'], 'integer'],
            [['sum'], 'number'],
            [['calculate_type'], 'string', 'max' => 25],
            [['calculate_type'], 'match', 'pattern' => '/^(calculate|order)$/', 'message' => Yii::t('app', 'Calculate type must be "order" or "calculate"')],
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
        return $this->hasOne(WindowFurniture::className(), ['id' => 'funrniture_id']);
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

    //=========================================//
    // ================= TODO ================ //
    //=========================================//
    private function calculate(){
        $price = 0;

        // Высчитываем квадратуру
        $price += (($this->height * $this->width)/1000000) * $this->type->price;

        // Накидываем процент региона
        $price += ($this->region->percent / 100) * $price;

        // Возвращаем округленную стоимость (округленную до целых гривен или нет, в зависимости от настроек)
        return Settings::get('round') ?  round($price, 0) : $price;
    }

    public function beforeValidate(){
        $this->created_at = time();
        $this->sum = $this->calculate();
        return parent::beforeValidate();
    }
}