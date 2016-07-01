<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DoorFurniture */

$this->title = Yii::t('app', 'Create Door Furniture');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Door Furnitures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="door-furniture-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
