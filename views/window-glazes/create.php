<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WindowGlazes */

$this->title = Yii::t('app', 'Create Window Glazes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Window Glazes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="window-glazes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
