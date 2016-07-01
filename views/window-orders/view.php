<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;


$this->title = $model->type->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Window Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calculate-window-view">

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
            Html::a(Yii::t('app', 'Take'), ['take', 'id' => $model->id, 'return_url' => Url::to(['/window-orders/view', 'id' => $model->id])], ['class' => 'btn btn-success', 'data-method' => 'post'])
            :
            Html::a(Yii::t('app', 'Untake'), ['untake', 'id' => $model->id, 'return_url' => Url::to(['/window-orders/view', 'id' => $model->id])], ['class' => 'btn btn-danger', 'data-method' => 'post', 'data-confirm' => Yii::t('app', 'Are you sure you want to untake this item?')]); ?>
        <?php endif; ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'sum',
            [
                'attribute' => 'type_id',
                'value' => $model->type->name
            ],
            'width',
            'height',
            [
                'attribute' => 'profile_id',
                'value' => $model->profile->name
            ],
            [
                'attribute' => 'glaze_id',
                'value' => $model->glaze->name
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
            'created_at',
        ],
    ]) ?>

</div>
