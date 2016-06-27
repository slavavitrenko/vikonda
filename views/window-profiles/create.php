<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WindowProfiles */

$this->title = Yii::t('app', 'Create Window Profiles');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Window Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="window-profiles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
