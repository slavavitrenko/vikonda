<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

// print_r($model->allProducts);
// die();


$this->title = $model->phone;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'phone',
            'email:email',
            'region.name',
            [
                'attribute' => 'created_at',
                'value' => Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$model->created_at]),
            ],
            [   
                'attribute' => '',
                'format' => 'raw',
                'value' => implode('<br>', array_values(ArrayHelper::map($model->products, 'id', 'amountName'))),
            ],
        ],
    ]) ?>

</div>
