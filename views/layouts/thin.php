<?php

use yii\widgets\Breadcrumbs;

?>

<div class="container">
<!-- 	<?= Breadcrumbs::widget([
		'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		]) ?> -->
		<?= \app\widgets\Alert::widget(); ?>
		<?= $content ?>
	</div>
</div>