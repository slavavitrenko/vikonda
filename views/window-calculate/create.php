<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WindowCalculate */

$this->title = Yii::t('app', 'Create Window Calculate');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Window Calculates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="window-calculate-create container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
