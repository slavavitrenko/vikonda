<?php

use yii\widgets\ListView;

Yii::$app->controller->layout = 'main';


$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;

$js = '
	$(".to-cart").on("click", function(){
		var button = $(this);
		$.post(
			button.attr("value"),
			{
				product_id: button.attr("data-product-id")
			},
			function(data){
				$.pjax.reload({container: "#cart-container"});
			}
		);
	});
';

$this->registerJs($js, \yii\web\View::POS_READY);

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