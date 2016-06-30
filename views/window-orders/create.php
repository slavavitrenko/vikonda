<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\calculating\CalculateWindow */

$this->title = Yii::t('app', 'Create Calculate Window');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Calculate Windows'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calculate-window-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
