<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Categories;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::encode($this->title) ?>
    </h1>

    <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'name',
                [
                    'attribute' => 'category_id',
                    'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'category_id',
                            'data' => ArrayHelper::map(Categories::find()->all(), 'id', 'name', 'parentName'),
                            'options' => ['placeholder' => Yii::t('app', 'Choose...')],
                            'pluginOptions' => ['allowClear' => true]
                        ]),
                    'value' => function($model){return $model->category ? $model->category->getName() : Yii::t('app', 'Not Set');}
                ],
                'price',
                [
                    'attribute' => 'created_at',
                    'filter' => false,
                    'value' => function($model){ return Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$model->created_at]);}
                ],
                [
                    'attribute' => 'pictures',
                    'format' => 'raw',
                    'value' => function($model){
                        return $model->pictures ? 'Кол-во изображений: ' . count($model->pictures) : '<span class="label label-danger">Нет изображений</span>'; 
                    }
                ],
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
</div>
