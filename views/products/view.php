<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use app\assets\SlickAsset;



$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => $model->category->name, 'url' => ['/products/index', 'ProductSearch[category_id]' => $model->category_id]];
$this->params['breadcrumbs'][] = $this->title;


$js = '
    $(".to-cart").on("click", function(){
        var button = $(this);
        var oldContent = button.html();
        $.post(
            button.attr("value"),
            {
                product_id: button.attr("data-product-id")
            },
            function(data){
                $.pjax.reload({container: "#cart-container"});
                button.html("<i class=\"glyphicon glyphicon-ok\"></i>");
                setTimeout(function(){
                    button.html(oldContent);
                }, 2000);
            }
        );
    });

    $(".slider-for").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: ".slider-nav"
  });
  $(".slider-nav").slick({
    arrows: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: ".slider-for",
    // dots: true,
    centerMode: true,
    focusOnSelect: true
});
';

$this->registerJs($js, \yii\web\View::POS_END);

?>
<div class="product-view container">

<?php if(!Yii::$app->user->isGuest) :?>
    <?php if (Yii::$app->user->identity->type == 'admin') :?>
        <p>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-product btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-product btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif; ?>
<?php endif; ?>
    <div class="row product-item-view">
        <div class="col-sm-4">
            <?php if($model->pictures) : ?>
                <div class="slider-for">
                    <?php foreach($model->pictures as $picture) : ?>
                        <div class="">
                        <?=Html::a('<i class="glyphicon glyphicon-remove"></i>', ['delete-image', 'id' => $picture->id, 'return_url' => Url::to(['/products/view', 'id' => $model->id])], ['class' => Yii::$app->user->isGuest ? 'hidden' : '']); ?>
                        <?=Html::img($picture->src, ['class' => 'img-responsive']);?>
                        </div>
                    <?php endforeach; ?>    
                </div>
                <div class="slider-nav">
                    <?php foreach($model->pictures as $picture) : ?>
                        <div class="">
                        <?=Html::a('<i class="glyphicon glyphicon-remove"></i>', ['delete-image', 'id' => $picture->id, 'return_url' => Url::to(['/products/view', 'id' => $model->id])], ['class' => Yii::$app->user->isGuest ? 'hidden' : '']); ?>
                        <?=Html::img($picture->src, ['class' => 'img-responsive']);?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-sm-8">
            <h2 class="product-title"><?=$model->name; ?></h2>
            <?php if(!empty($model->manufacturer)): ?>
                <h3><?=Yii::t('app', 'Manufacturer')?>: <?=$model->manufacturer; ?></h3>
            <?php endif; ?>
            <div class='product-text'>
                <span class='lead'><?=Yii::t('app', 'Price')?>: <?=$model->price; ?></span>
    
                <?=Html::a(Yii::t('app', 'To cart'), false,
                    [
                        'class' => 'btn btn-no-border btn-primary to-cart',
                        'value' => Url::to(['/products/add-in-cart']),
                        'data-product-id' => $model->id,
                    ])?>
            </div>
            <?=$model->description; ?>
        </div>
    </div>
</div>
