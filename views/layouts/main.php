<?php

use yii\helpers\Html;
use \app\models\Categoriesblog;
use app\models\Categories;

\app\assets\AppAsset::register($this);

?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= Html::encode($this->title) ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?= Html::csrfMetaTags() ?>
        <?php if(!empty($this->params['keywords']) && !empty($this->params['description'])):?>
            <meta name="keywords" content="<?=Html::encode(!empty($this->params['keywords']) ? $this->params['keywords'] : '' ); ?>">
            <meta name="description" content="<?=Html::encode(!empty($this->params['description']) ? $this->params['description'] : '' ); ?>">
            <link rel="alternate" href="<?=Html::encode(!empty($this->params['link_ru']) ? $this->params['link_ru'] : '' ); ?>" hreflang="<?=Html::encode(!empty($this->params['lang_ru']) ? $this->params['lang_ru'] : '' ); ?>" />
            <link rel="alternate" href="<?=Html::encode(!empty($this->params['link_uk']) ? $this->params['link_uk'] : '' ); ?>" hreflang="<?=Html::encode(!empty($this->params['lang_uk']) ? $this->params['lang_uk'] : '' ); ?>" />

        <?php endif;?>
        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>


    <header class="header">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12  col-xl-3 logo text-center">
                    <a href="#"><img class="img-fluid" src="/images/Image 11.png" alt=""></a>
                    <p>Окна и двери для Вашего дома<br>Изготовление и установка</p>
                </div>
                <div class="col-12 col-sm-6 col-xl-4">
                    <form class="form-inline">
                        <input class="form-control" type="text" placeholder="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
                <div class="col-12 col-sm-6 col-xl-2">
                    <p class="bordered text-center">Город:<br>Полтава</p>
                </div>
                <div class="col-12 col-xl-3">
                    <p>+38 <span class="font-weight-bold">(0xx)</span>xx <span class="show-numbers">показать все номера</span></p>
                </div>
            </div>
        </div>
    </header>
    <div class="top-menu container-fluid text-center">
        <div class="row no-gutters">
            <?php
            foreach (Categories::find()->where(['parent' => 0])->all() as $category) :?>
                <div class="col bordered">
                    <?=
                    Html::a(Yii::t('app', $category->name), ['/products/category/', 'id' => $category->id],
                        ['class'=> 'btn btn-block']);
                    ?>
                </div>
                <?php
            endforeach;
            ?>
            <?php
            foreach (Categoriesblog::find()->all() as $categoryblog) :?>
                <div class="col bordered">
                    <?=
                    Html::a(Yii::t('app', $categoryblog->title), ['/categoriesblog/category', 'slug' => $categoryblog->slug],
                        ['class'=> 'btn btn-block']);
                    ?>
                </div>
                <?php
            endforeach;
            ?>
            <div class="col bordered"><a class="btn btn-block" href="/site/about">О компании</a></div>
        </div>
    </div>
    <?php if(!Yii::$app->user->isGuest && Yii::$app->user->identity->type == 'admin' && Yii::$app->controller->id != 'site'): ?>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <?=$this->render('sidebar'); ?>
                </div>
                <div class="col-md-9">
                    <?=$content; ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?=$content;?>
    <?php endif; ?>

    <footer class="footer">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <img src="/images/Image-footer.png" alt="">
                    <div class="social-group">
                        <a href="#"><i class="fa fa-vk" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-odnoklassniki" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-md-4 link-footer">
                    <a href="#">Двери</a><br>
                    <a href="#">Комплектующие<br>
                        (продукция)</a><br>
                    <a href="#">Сервис и услуги</a><br>
                    <a href="#">Акции</a><br>
                    <a href="#">О компании</a>
                </div>
                <div class="col-md-4">
                    <div class="contacts">
                        <i class="fa fa-phone fa-2x  pull-left" aria-hidden="true"></i>
                        <p>+38(050)7272275</br>
                            +38(067)5555555</p>
                        <i class="fa fa-envelope fa-2x  pull-left" aria-hidden="true"></i>
                        <p>info@unicweb.com.ua</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>