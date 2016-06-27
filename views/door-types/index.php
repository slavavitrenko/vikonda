<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DoorTypesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Door Types');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="door-types-index">

    <h1>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::encode($this->title) ?>
    </h1>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            'description',
            [
                'attribute' => 'picture',
                'format' => 'raw',
                'value' => function($model){
                    return Html::img('/' . $model->picture, ['class' => 'img-responsive', 'style' => 'max-width:200px']);
                }
            ],
            'price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
