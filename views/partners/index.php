<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Regions;

$this->title = Yii::t('app', 'Partners');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-index">

    <h1>
        <?= Html::encode($this->title) ?>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success']) ?>
    </h1>

    <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                'name',
                [
                    'attribute' => 'region',
                    'value' => function($model){return $model->regions ? implode(', ', ArrayHelper::map($model->regions, 'id', 'name')) : '';},
                    'filter' => Select2::widget([
                            'model' => $searchModel,
                            'attribute' => 'region',
                            'data' => ArrayHelper::map(Regions::find()->all(), 'id', 'name'),
                            'options' => ['placeholder' => Yii::t('app', 'Choose...')],
                            'pluginOptions' => ['allowClear' => true],
                        ]),
                ],
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
    
</div>