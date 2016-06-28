<?php

use yii\widgets\Breadcrumbs;

?>
<div class="container">
	<div class="row">
			<?= Breadcrumbs::widget([
				'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			]) ?>
		<div class="col-sm-3">
			<?=$this->render('@app/views/layouts/sidebar'); ?>
		</div>
		<div class="col-sm-9" id='main-layout'>
			<?= \app\widgets\Alert::widget(); ?>
			<?= $content ?>
		</div>
	</div>
</div>