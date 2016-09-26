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
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::encode($this->title) ?>
    </h1>

    <?= TreeGrid::widget([
            'keyColumnName' => 'id',
            'parentColumnName' => 'parent',
            'parentRootValue' => '0',
            'dataProvider' => $dataProvider,
            'columns' => [
                'name',
                ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
            ],
        ]); ?>
</div>
