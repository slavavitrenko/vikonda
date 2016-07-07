<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;


$this->title = $model->type->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Door Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calculate-door-view container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if(in_array(Yii::$app->user->identity->type, ['admin', 'manager'])) : ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        <?php endif; ?>
        <?php if(Yii::$app->user->identity->type == 'partner') : ?>
            <?= $model->partner_id == '0' ?
            Html::a(Yii::t('app', 'Take'), ['take', 'id' => $model->id, 'return_url' => Url::to(['/door-orders/view', 'id' => $model->id])], ['class' => 'btn btn-success', 'data-method' => 'post'])
            :
            /*Html::a(Yii::t('app', 'Untake'), ['untake', 'id' => $model->id, 'return_url' => Url::to(['/door-orders/view', 'id' => $model->id])], ['class' => 'btn btn-danger', 'data-method' => 'post', 'data-confirm' => Yii::t('app', 'Are you sure you want to untake this item?')]); */ '' ?>
        <?php endif; ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'sum',
            'fio',
            [
                'attribute' => 'phone',
                'visible' => $model->partner_id == Yii::$app->user->identity->id or Yii::$app->user->identity->type == 'admin',
            ],
            [
                'attribute' => 'email',
                'visible' => $model->partner_id == Yii::$app->user->identity->id or Yii::$app->user->identity->type == 'admin',
            ],
            [
                'attribute' => 'type_id',
                'value' => $model->type->name
            ],
            'width',
            'height',
            [
                'attribute' => 'box',
                'value' => Yii::t('app', $model->box ? 'Yeap' : 'Nope')
            ],
            [
                'attribute' => 'jamb',
                'value' => Yii::t('app', $model->jamb ? 'Yeap' : 'Nope')
            ],
            [
                'attribute' => 'locker',
                'value' => Yii::t('app', $model->locker ? 'Yeap' : 'Nope')
            ],
            [
                'attribute' => 'furniture_id',
                'value' => $model->furniture->name
            ],
            [
                'attribute' => 'region_id',
                'value' => $model->region->name
            ],
            // 'calculate_type',
            [
                'attribute' => 'created_at',
                'value' => Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$model->created_at])
            ],
        ],
    ]) ?>

</div>
