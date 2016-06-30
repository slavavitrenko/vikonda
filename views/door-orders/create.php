<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\calculating\CalculateDoor */

$this->title = Yii::t('app', 'Create Calculate Door');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Calculate Doors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calculate-door-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
