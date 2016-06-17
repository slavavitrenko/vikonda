<?php

use yii\helpers\Html;
use yii\helpers\Url;


$this->title = Yii::t('app', 'Cart');
$this->params['breadcrumbs'][] = $this->title;

$js = '
	$(document).on("pjax:complete", "#order-container", function(event) {
        $.pjax.reload({container:"#cart-container"});
	});
';

$this->registerJs($js, \yii\web\View::POS_READY);

?>

<div class="row">
	<div class="col-sm-9">
		<?php if(count($order->products) >= 1) { ?>
			<?php \yii\widgets\Pjax::begin(['id' => 'order-container']); ?>
			<p><?=Html::a('< ' . Yii::t('app', 'Go back'), ['/products/index'], ['class' => 'btn btn-sm btn-primary', 'onclick' => 'history.back()']); ?></p>
			<table class="table table-bordered table-striped orders-table">
				<th><?=Yii::t('app', 'Name'); ?></th>
				<th><?=Yii::t('app', 'Count'); ?></th>
				<th><?=Yii::t('app', 'Amount'); ?></th>
				<?php foreach($order->products as $product) : ?>
					<tr>
						<td><?=Html::a($product->product->name, ['/products/view', 'id' => $product->product->id], ['target' => '_blank', 'class' => 'lead', 'data-pjax' => 0]); ?></td>
						<td>
							<?=Html::a('<i class="glyphicon glyphicon-minus"></i>', ['set-count', 'product_id' => $product->product->id, 'count' => $product->count - 1], ['class' => 'btn btn-xs btn-danger']); ?>
							<span id="product-counter-<?=$product->product->id; ?>" class='lead'><?=$product->count; ?></span>
							<?=Html::a('<i class="glyphicon glyphicon-plus"></i>', ['set-count', 'product_id' => $product->product->id, 'count' => $product->count + 1], ['class' => 'btn btn-xs btn-success']); ?>
						</td>
						<td>
							<span class='pull-right'><?=number_format($product->count * $product->product->price, 2, ',', ' ') . ' грн.'; ?>
														<?=Html::a('<i class="glyphicon glyphicon-remove"></i>', ['delete-from-cart', 'product_id' => $product->product->id], ['class' => 'btn btn-sm btn-danger']); ?></span>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
			<?php \yii\widgets\Pjax::end(); ?>
		<?php } else{ ?>
			<h2><?=Yii::t('app', 'Not enough products')?></h2>
			<p><?=Html::a(Yii::t('app', 'Get searching?'), ['/products/index'], ['class' => 'btn btn-lg btn-success']);?></p>
		<?php }?>
	</div>
	<div class="col-sm-3">
	</div>
</div>