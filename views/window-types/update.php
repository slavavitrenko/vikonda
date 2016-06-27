<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WindowTypes */

$this->title = Yii::t('app', 'Update Window Types');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Window Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="window-types-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
