<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Products;

/**
 * ProductSearch represents the model behind the search form about `app\models\Products`.
 */
class ProductSearch extends Products
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'created_at'], 'integer'],
            [['name', 'description', 'manufacturer'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName=null)
    {
        $query = Products::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('category');

        // grid filtering conditions
        $query->andFilterWhere([
            'category_id' => $this->category_id,
            'created_at' => $this->created_at,
        ]);

        if(Yii::$app->user->isGuest){
            $query->andFilterWhere(['categories.visible' => '1']);
        }

        $query->orFilterWhere(['categories.parent' => $this->category_id]);

        $query->andFilterWhere(['like', 'products.name', $this->name])
            ->andFilterWhere(['like', 'products.manufacturer', $this->manufacturer])
            ->andFilterWhere(['like', 'products.description', $this->description]);

        return $dataProvider;
    }
}
