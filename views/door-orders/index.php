<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\DoorTypes;
use app\models\Regions;


$this->title = Yii::t('app', 'Door Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calculate-door-index">

    <?=$this->render('@app/views/orders/_menu', \app\components\OrdersCount::count()) ?>

    <?php Pjax::begin(['id' => 'doors-container']); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'summary' => '',
            'columns' => [
                // ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                [
                    'attribute' => 'sum',
                    'value' => function($model){return $model->sum . ' ' . Yii::t('app', 'cur');}
                ],
                [
                    'attribute' => 'partner_id',
                    'visible' => in_array(Yii::$app->user->identity->type, ['admin', 'manager']),
                    'format' => 'raw',
                    'value' => function($model){
                        return $model->partner_id ? '<span class="label label-success">' . Yii::t("app", "Taked") . ' - ' . $model->partner->username . '</span>' : '<span class="label label-warning">' . Yii::t('app', 'Not taked') . '</span>';
                    }
                ],
                [
                    'attribute' => 'type_id',
                    'value' => function($model){ return $model->type->name; },
                    'filter' => Html::activeDropdownList($searchModel, 'type_id', ArrayHelper::map(DoorTypes::find()->all(), 'id', 'name'), ['class' => 'form-control', 'prompt' => ''/*Yii::t('app', 'Choose...')*/])
                ],
                // 'width',
                // 'height',
                // [
                //     'attribute' => 'box',
                //     'value' => function($model){ return Yii::t('app', $model->box ? 'Yeap' : 'Nope'); },
                // ],
                // [
                //     'attribute' => 'jamb',
                //     'value' => function($model){ return Yii::t('app', $model->jamb ? 'Yeap' : 'Nope'); },
                // ],
                // [
                //     'attribute' => 'locker',
                //     'value' => function($model){ return Yii::t('app', $model->locker ? 'Yeap' : 'Nope'); },
                // ],
                [
                    'attribute' => 'region_id',
                    'value' => function($model){ return $model->region->name; },
                    'filter' => Html::activeDropdownList($searchModel, 'region_id', ArrayHelper::map(Regions::find()->all(), 'id', 'name'), ['class' => 'form-control', 'prompt' => ''/*Yii::t('app', 'Choose...')*/])
                ],
                // 'calculate_type',
                [
                    'attribute' => 'created_at',
                    'value' => function($model){ return Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$model->created_at]);}
                ],
                [
                    'class' => 'yii\grid\ActionColumn', 'template' => in_array(Yii::$app->user->identity->type, ['admin', 'manager']) ? '{view} {delete}' : '{take} {view}',
                    'buttons' => [
                        'take' => function($url, $model, $key){
                            return $model->partner_id == '0' ?
                            Html::a(Yii::t('app', 'Take'), ['take', 'id' => $key], ['class' => 'btn btn-sm btn-success', 'data-method' => 'post'])
                            :
                            /*Html::a(Yii::t('app', 'Untake'), ['untake', 'id' => $key], ['class' => 'btn btn-sm btn-danger', 'data-method' => 'post', 'data-confirm' => Yii::t('app', 'Are you sure you want to untake this item?')])*/'';
                        }
                    ]
                ],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
</div>
