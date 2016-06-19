<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Regions;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;


$this->title = Yii::t('app', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'amount',
            'phone',
            'email:email',
            [
                'attribute' => 'region_id',
                'filter' => Select2::widget([
                        'model' => $searchModel,
                        'attribute' => 'region_id',
                        'data' => ArrayHelper::map(Regions::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Choose...')],
                        'pluginOptions' => ['allowClear' => true]
                    ]),
                'value' => 'region.name'
            ],
            // 'updated_at',
            [
                'attribute' => 'created_at',
                'value' => function($model){ return Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$model->created_at]);}
            ],

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {delete}'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
