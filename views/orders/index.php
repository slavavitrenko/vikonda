<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Regions;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

$regions = in_array(Yii::$app->user->identity->type, ['admin', 'manager']) ? Regions::find()->all() : Regions::find()->where(['id' => array_values(ArrayHelper::map(Yii::$app->user->identity->regions, 'id', 'id'))])->all();

$this->title = Yii::t('app', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'amount',
                'value' => function($model){return $model->amount . ' грн.';}
            ],
            [
                'attribute' => 'partner_id',
                'visible' => in_array(Yii::$app->user->identity->type, ['admin', 'manager']),
                'format' => 'raw',
                'value' => function($model){
                    return $model->partner_id ? '<span class="label label-success">' . Yii::t("app", "Taked") . ' - ' . $model->partner->username . '</span>' : '<span class="label label-warning">' . Yii::t('app', 'Not taked') . '</span>';
                }
            ],
            'phone',
            'email:email',
            [
                // 'visible' => in_array(Yii::$app->user->identity->type, ['admin', 'manager']),
                'attribute' => 'region_id',
                'filter' => Select2::widget([
                        'model' => $searchModel,
                        'attribute' => 'region_id',
                        'data' => ArrayHelper::map($regions, 'id', 'name'),
                        'options' => ['placeholder' => Yii::t('app', 'Choose...')],
                        'pluginOptions' => ['allowClear' => true]
                    ]),
                'value' => 'region.name',
            ],
            // 'updated_at',
            [
                'attribute' => 'created_at',
                'value' => function($model){ return Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$model->created_at]);}
            ],

            [
                'class' => 'yii\grid\ActionColumn', 'template' => in_array(Yii::$app->user->identity->type, ['admin', 'manager']) ? '{view} {delete}' : '{take} {view} {delete}',
                'buttons' => [
                    'take' => function($url, $model, $key){
                        return $model->partner_id == '0' ?
                        Html::a(Yii::t('app', 'Take'), ['take', 'id' => $key], ['class' => 'btn btn-sm btn-success', 'data-method' => 'post'])
                        :
                        Html::a(Yii::t('app', 'Untake'), ['untake', 'id' => $key], ['class' => 'btn btn-sm btn-danger', 'data-method' => 'post', 'data-confirm' => Yii::t('app', 'Are you sure you want to untake this item?')]);
                    }
                ]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
