<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WindowFurniture */

$this->title = Yii::t('app', 'Create Window Furniture');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Window Furnitures'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="window-furniture-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
