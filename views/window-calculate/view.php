<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\WindowCalculate */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Window Calculates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="window-calculate-view container">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'phone',
            'city',
            'profile_type',
            'window_type',
            'height',
            'width',
            'opening_type',
        ],
    ]) ?>

</div>
