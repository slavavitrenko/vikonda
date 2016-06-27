<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WindowTypes */

$this->title = Yii::t('app', 'Create Window Types');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Window Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="window-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
