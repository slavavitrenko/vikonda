<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SettingsSeo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Settings Seo',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Settings Seos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="settings-seo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
