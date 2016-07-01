<?php

use yii\helpers\Html;
use yii\helpers\Url;

use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use app\models\Regions;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;


$this->title = Yii::t('app', 'Cart');
$this->params['breadcrumbs'][] = $this->title;

$js = '
	$(document).on("pjax:complete", "#order-container", function(event) {
        $.pjax.reload({container:"#cart-container"});
	});
';

$this->registerJs($js, \yii\web\View::POS_READY);


?>

<?php if(count($order->products) >= 1) { ?>
	<div class="row">
		<div class="col-sm-8">
			<?php \yii\widgets\Pjax::begin(['id' => 'order-container']); ?>
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
					<tr>
						<td></td>
						<td></td>
						<td><span class='lead'><?=Yii::t('app', 'Total amount')?>:</span> <span class='pull-right lead'><?=Yii::$app->cart->order->amount; ?> грн.</span></td>
					</tr>
			</table>
			<?php \yii\widgets\Pjax::end(); ?>
	</div>
	<div class="col-sm-4">
			<?php $form = ActiveForm::begin(); ?>
			<?=$form->field($model, 'fio'); ?>
			<?= $form->field($model, 'phone')->widget(MaskedInput::className(), ['mask' => '+380999999999']) ?>
			<?=$form->field($model, 'email')->widget(MaskedInput::className(), ['clientOptions' => ['alias' =>  'email']]); ?>
			<?=$form->field($model, 'region_id')->widget(Select2::className(), [
					'data' => ArrayHelper::map(Regions::find()->all(), 'id', 'name'),
					'options' => ['placeholder' => Yii::t('app', 'Choose...')],
					'pluginOptions' => ['allowClear' => false]
				]); ?>

			<div class="form-group">
				<?= Html::submitButton(Yii::t('app', 'Send') , ['class' => 'btn btn-primary btn-block btn-lg']) ?>
			</div>
			<?php ActiveForm::end(); ?>
	</div>
</div>

		<?php } else{ ?>
			<h2><?=Yii::t('app', 'Not enough products')?></h2>
			<p><?=Html::a(Yii::t('app', 'Get searching?'), ['/products/index'], ['class' => 'btn btn-lg btn-success']);?></p>
		<?php }?>
