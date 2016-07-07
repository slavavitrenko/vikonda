<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>


<div class="row product-item">
	<div class="col-md-3">
		<?=Html::img($model->pictures[rand(0, $model->picCount -1)]->src, ['class' => 'img-responsive']); ?>
		<div class='btn-group'>
			<?=Html::a(Yii::t('app', 'Details'), ['/product/' . $model->id], ['class' => 'btn-product btn btn-success']); ?>
			<?=Html::a(Yii::t('app', 'To cart'), false,
				[
					'class' => 'btn-product btn btn-primary to-cart',
					'value' => Url::to(['/products/add-in-cart']),
					'data-product-id' => $model->id,
				])?>
		</div>
	</div>
	<div class="col-md-9">
		<h2 class='product-title'><?=Html::encode($model->name); ?></h2>
    	<div class="product-text">
    		<span class='lead'><?=Yii::t('app', 'Price')?>: <?=$model->price; ?></span>
    	</div>
		<?=mb_substr($model->description, 0, 250) . '...'; ?>
	</div>
</div>