<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>


<div class="row">
	<div class="col-md-3">
		<?=Html::img($model->pictures[rand(0, $model->picCount -1)]->src, ['class' => 'img-responsive']); ?>
	</div>
	<div class="col-md-9">
		<h2><?=$model->name; ?></h2>
		<div class='btn-group'>
			<?=Html::a(Yii::t('app', 'Details'), ['view', 'id' => $model->id], ['class' => 'btn btn-md btn-no-border btn-success']); ?>
			<?=Html::a(Yii::t('app', 'To cart'), false,
				[
					'class' => 'btn btn-no-border btn-primary to-cart',
					'value' => Url::to(['/products/add-in-cart']),
					'data-product-id' => $model->id,
				])?>
		</div>
		<?=mb_substr($model->description, 0, 350) . '...'; ?>
	</div>
</div>
<hr>