<?php

use yii\widgets\ListView;

Yii::$app->controller->layout = 'main';


$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">
	<div class="col-sm-9">
		<?= ListView::widget([
		    'dataProvider' => $dataProvider,
		    'summary' => '',
		    // 'options' => [
		    //     'tag' => 'div',
		    //     'class' => 'list-wrapper',
		    //     'id' => 'list-wrapper',
		    // ],
		    'itemView' => '_item',
		]);?>
	</div>
	<div class="col-sm-3">
		<?=$this->render('_nav'); ?>
	</div>
</div>