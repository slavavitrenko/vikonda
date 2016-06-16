<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use app\models\Categories;

use leandrogehlen\treegrid\TreeGrid;

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">

    <h1>
        <?= Html::encode($this->title) ?>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success']) ?>
    </h1>

    <?php Pjax::begin(); ?>
        <?= TreeGrid::widget([
            'keyColumnName' => 'id',
            'parentColumnName' => 'parent',
            'dataProvider' => $dataProvider,
            'columns' => [
                'name',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    <?php Pjax::end(); ?>
</div>
