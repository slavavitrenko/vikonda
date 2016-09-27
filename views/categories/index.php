<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use app\models\Categories;

use leandrogehlen\treegrid\TreeGrid;

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;

$js = "
    $('table').css('opacity', 0.3);
    $.each($('tr'), function(){
        var tr = $(this);
        var tree_id = tr.attr('class');
        if(tree_id){
            tree_id = tree_id.split(' ')[0].replace('treegrid-', '');
            var data_key = tr.attr('data-key');
        }
        tr.html(tr.html().replace(data_key, tree_id).replace(data_key, tree_id).replace(data_key, tree_id));
    });
    $('table').css('opacity', 1);
";

$this->registerJs($js, yii\web\View::POS_END);

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
                // 'id',
                'name',
                [
                    'class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}',
                ],
            ],
        ]); ?>
</div>
