<?php

use app\models\Categories;
use leandrogehlen\treegrid\TreeGrid;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;


$dataProvider = new ActiveDataProvider([
	'query' => Categories::find()->where(['visible' => 1]),
	'pagination' => [
		'pageSize' => 10,
	],
]);

?>

<?= TreeGrid::widget([
    'keyColumnName' => 'id',
    'parentColumnName' => 'parent',
    'dataProvider' => $dataProvider,
    'columns' => [
        [
        	'attribute' => 'name',
        	'header' => Yii::t('app', 'Categories'),
        	'format' => 'raw',
        	'value' => function($model){
        		return Html::a($model->name, ['index', 'ProductSearch[category_id]' => $model->id]);
        	}
        ],
    ],
]); ?>