<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

<?php if(!Yii::$app->user->isGuest) :?>
    <?php if (Yii::$app->user->identity->type == 'admin') :?>
        <p>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif; ?>
<?php endif; ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'category.name',
            'name',
            'description:html',
            [
                'attribute' => 'created_at',
                'value' => Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$model->created_at])
            ],
        ],
    ]) ?>

    <div class="row">
        <?php if($model->pictures) : ?>
            <?php foreach($model->pictures as $picture) : ?>
                <?=Html::img($picture->src, ['class' => 'well col-sm-4']);?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

</div>
