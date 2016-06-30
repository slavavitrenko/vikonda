<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\calculating\CalculateDoor */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Calculate Door',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Calculate Doors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="calculate-door-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
