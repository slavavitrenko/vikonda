<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;
use app\models\Settings;

AppAsset::register($this);

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
<body class="<?=Yii::$app->controller->action->id == 'calculate' ? 'background' : ''?>">
<?php $this->beginBody() ?>

<?=$this->render('@app/views/layouts/navbar'); ?>

	<?php
	if(!Yii::$app->user->isGuest){
		if(in_array(Yii::$app->user->identity->type, ['admin', 'manager']) && Yii::$app->controller->id != 'site'){
			echo $this->render('wide', ['content' => $content]);
		} else {
			echo $this->render('thin', ['content' => $content]);
		}
	} else {
		echo $this->render('thin', ['content' => $content]);
	} ?>

<footer class="footer">
    <div class="container">
        <div class="row footer-main-block">
            <div class="col-md-4 col-xs-6 ">
                <div class="logo">
                    <a href="<?=Url::to(['/'])?>"><img class="img-responsive" src="/img/logo.png" alt="logotype"></a>
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
            <div class="col-md-4 footer-navigation-bar">
                <ul class="footer-nav">
                    <li><?=Html::a(Yii::t('app', 'Home'), ['/']); ?></li>
                    <li><?=Html::a(Yii::t('app', 'Products'), ['/products'])?></li>
                    <li><?=Html::a(Yii::t('app', 'Calculator'), ['/site/calculate/window']); ?></li>
                    <li><?=Html::a(Yii::t('app', 'About'), ['/site/about']); ?></li>
                </ul>
            </div>
            <div class="col-md-4 col-xs-6">
                <div class="footer-contacts">
                    <div class="address">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p><span>г. Полтава</span> <br> ул. Маршала Конева, 4/2</p>
                    </div>
                    <div class="contacts">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <div class="contact-wrap">
                            <span><?=Settings::get('admin_phone'); ?></span><br>
                        </div>
                    </div>
                    <div class="mail">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span><?=Html::a(Settings::get('admin_email'), 'mailto:' . Settings::get('admin_email'), ['target' => '_blank']); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer-mini-block">
            <div class="col-xs-12">
                <div class="logo">
                    <a href="<?=Url::to(['/'])?>"><img class="img-responsive" src="/img/logo.png" alt="logotype"></a>
                </div>
                <div class="footer-contacts">
                    <div class="address">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p><span>г. Полтава</span> <br> ул. Маршала Конева, 4/2</p>
                    </div>
                    <div class="contacts">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <div class="contact-wrap">
                            <span><?=Settings::get('admin_phone'); ?></span><br>
                        </div>
                    </div>
                    <div class="mail">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span><?=Html::a(Settings::get('admin_email'), 'mailto:' . Settings::get('admin_email'), ['target' => '_blank']); ?></span>
                    </div>
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
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
