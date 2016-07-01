<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\FrontendAsset;

$js = '
var baseUrl = window.location.protocol + "//" + window.location.hostname + ":8093";
var socket = io(baseUrl);

socket.on("mess", function(){
	window.location = window.location;
});';

if(!Yii::$app->user->isGuest){
	// $this->registerJs($js, \yii\web\View::POS_READY);
}

FrontendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

<?=$this->render('@app/views/layouts/navbar'); ?>

	<?php
	if(!Yii::$app->user->isGuest){
		if(in_array(Yii::$app->user->identity->type, ['admin', 'manager'])){
			echo $this->render('wide', ['content' => $content]);
		} else {
			echo $this->render('thin', ['content' => $content]);
		}
	} else {
		echo $this->render('thin', ['content' => $content]);
	} ?>
</div>

<footer class="footer">
	<div class="container">
		<p class="pull-left">&copy; <?=Yii::$app->params['siteName']; ?> <?= date('Y') ?></p>
	</div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
