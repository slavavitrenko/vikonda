<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>


<div class="row">
	<div class="col-sm-3">
		<?=Html::img($model->pictures[rand(0, $model->picCount -1)]->src, ['class' => 'img-responsive']); ?>
		<div class='btn-group'>
			<?=Html::a(Yii::t('app', 'Details'), ['view', 'id' => $model->id], ['class' => 'btn btn-md btn-no-border btn-success']); ?>
			<?=Html::a(Yii::t('app', 'To cart'), false,
				[
					'class' => 'btn btn-no-border btn-primary to-cart',
					'value' => Url::to(['/products/add-in-cart']),
					'data-product-id' => $model->id,
				])?>
		</div>
	</div>
	<div class="col-sm-9">
		<h2><?=$model->name; ?></h2>
		<?=mb_substr($model->description, 0, 250) . '...'; ?>
		<p>
			<span class='lead'><?=Yii::t('app', 'Category')?>: <?=Html::a($model->category->name, ['index', 'ProductSearch[category_id]' => $model->category->id], ['class' => 'label label-default']);?></span>
			<span class="pull-right"><?=Yii::t('user', '{0, date, MMMM dd, YYYY HH:mm}', [$model->created_at])?></span>
		</p>
	</div>
</div>
<hr>