<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\FrontendAsset;
use app\models\Settings;

FrontendAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
    <title><?=Yii::$app->params['siteName']?> | <?= Html::encode($this->title) ?></title>
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
        <div class="row">
            <div class="col-md-4">
                <div class="logo">
                    <img class="img-responsive" src="/img/logo.png" alt="logotype">
                </div>
                <div class="social">
                    <ul class="nav nav-pills">
                        <li><a href=""><i class="fa fa-vk" aria-hidden="true"></i></a></li>
                        <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href=""><i class="fa fa-odnoklassniki" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <div class="copy">
                    <a href="http://unicweb.com.ua">&copy; UnicWeb 2016</a>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="footer-nav">
                    <li><a href="">Главная</a></li>
                    <li><a href="">Товар</a></li>
                    <li><a href="">Калькулятор</a></li>
                    <li><a href="">Контакты</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <div class="footer-contacts">
                    <div class="address">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p><span>г. Полтава</span> <br> ул. Маршала Конева, 4/2</p>
                    </div>
                    <div class="contacts">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <div class="contact-wrap">
                            <span><?=Html::a(Settings::get('admin_phone'), 'tel:' . Settings::get('admin_phone'), ['target' => '_blank']); ?></span><br>
                        </div>
                    </div>
                    <div class="mail">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span><?=Html::a(Settings::get('admin_email'), 'mailto:' . Settings::get('admin_email'), ['target' => '_blank']); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
