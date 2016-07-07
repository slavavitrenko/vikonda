<?php

namespace app\models\calculating;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\calculating\CalculateWindow;
use yii\helpers\ArrayHelper;


class WindowOrderSearch extends CalculateWindow
{

    public function rules()
    {
        return [
            [['id', 'type_id', 'width', 'height', 'profile_id', 'glaze_id', 'furniture_id', 'region_id'], 'integer'],
            [['calculate_type'], 'safe'],
            [['sum'], 'number'],
            [['created_at'], 'default', 'value' => ''],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }
    
    public function beforeValidate(){
        return true;
    }

    public function search($params)
    {
        $query = CalculateWindow::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->joinWith('region');
        
        if(Yii::$app->user->identity->type == 'partner'){
            $query
            ->andFilterWhere(['calculate_window.partner_id' => '0'])
            ->andFilterWhere(['regions.id' => array_values(ArrayHelper::map(Yii::$app->user->identity->regions, 'id', 'id'))])
            ->orFilterWhere(['calculate_window.partner_id' => Yii::$app->user->identity->id]);
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'type_id' => $this->type_id,
            'width' => $this->width,
            'height' => $this->height,
            'profile_id' => $this->profile_id,
            'glaze_id' => $this->glaze_id,
            'furniture_id' => $this->furniture_id,
            'region_id' => $this->region_id,
            'sum' => $this->sum,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'calculate_type', $this->calculate_type]);
        
        $query->andFilterWhere(['calculate_type' => 'order']);

        return $dataProvider;
    }
}
