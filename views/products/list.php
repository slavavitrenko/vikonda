<?php

use yii\widgets\ListView;

Yii::$app->controller->layout = 'main';


$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;

$js = '
	$(".to-cart").on("click", function(){
		var button = $(this);
		var oldContent = button.html();
		$.post(
			button.attr("value"),
			{
				product_id: button.attr("data-product-id")
			},
			function(data){
				$.pjax.reload({container: "#cart-container"});
				button.html("<i class=\"glyphicon glyphicon-ok\"></i>");
				setTimeout(function(){
					button.html(oldContent);
				}, 2000);
			}
		);
	});
';

$this->registerJs($js, \yii\web\View::POS_READY);

?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<?= ListView::widget([
			    'dataProvider' => $dataProvider,
			    'summary' => '',
			    'options' => [
			        'tag' => 'div',
			        'class' => 'product-list',
			    //     'id' => 'list-wrapper',
			    ],
			    'itemView' => '_item',
			]);?>
		</div>
	</div>
</div>