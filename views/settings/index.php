<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', 'Update Settings');
$this->params['breadcrumbs'][] = Yii::t('app', 'Update Settings');
?>
<div class="regions-update">

	<h1><?= Html::encode($this->title) ?></h1>


	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'box_price') ?>

	<?=$form->field($model, 'jamb_price') ?>

	<?=$form->field($model, 'locker_price') ?>

	<?= $form->field($model, 'round')->radioList([
	        '1' => Yii::t('app', 'Yeap'),
	        '0' => Yii::t('app', 'Nope'),
	    ], [
	        'id' => 'round-type',
	        'class' => 'btn-group form-group',
	        'data-toggle' => 'buttons',
	        'unselect' => null, // remove hidden field
	        'item' => function ($index, $label, $name, $checked, $value) {
	            return '<label class="btn btn-success' . ($checked ? ' active' : '') . '">' .
	                Html::radio($name, $checked, ['value' => $value, 'class' => 'project-status-btn']) . $label . '</label>';
	        },
	]) ?>

	<div class="form-group">
		<?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
