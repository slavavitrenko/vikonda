<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Home');

$this->registerJsFile('/js/bee3D.js');


$js = "
    /*=======---bee3d slider---=======*/
    var bee3d = document.getElementById('bee3d');

    var slider = new Bee3D(bee3d, {
        effect: 'coverflow',
        focus: 2,
        navigation: {
            enabled: true
        },
        // autoplay: {
        //     enabled: true,
        //     pauseHover: true
        // },
        loop: {
            enabled: true,
            continuous: true,
        }
    });
";

$this->registerJs($js, \yii\web\View::POS_END);

$js = "";

    $this->registerJs($js, \yii\web\View::POS_READY);
?>


<section class="section-slider">
    <div class="blur"></div>
    <div class="container">
        <div class="slider-desc text-center">
            <h1>Окна европейского качества <br> от производителя</h1>
            <p>Уважаемые посетители нашего сайта, Вы сможете максимально удобно, не выходя из дома в любую погоду  и любое время ознакомиться со всем перечнем предлагаемых нами  товаров и заказать их в любом уголке Украины.</p>
            <?=Html::a(Yii::t('app', 'Calculate price'), ['/site/calculate/window'], ['class' => 'btn btn-default']); ?>
            <?=Html::a(Yii::t('app', 'View catalog'), ['/products'], ['class' => 'btn btn-default']); ?>
        </div>

    </div>
</section>

<section class="section-advantages">
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-center advantage-item">
                <img src="/img/shild.png" alt="shild" class="img-responsive">
                <span>Гарантия 5 лет</span>
            </div>
            <div class="col-md-3 text-center advantage-item">
                <img src="/img/wrench.png" alt="wrench" class="img-responsive">
                <span>Установка за 1 день</span>
            </div>
            <div class="col-md-3 text-center advantage-item">
                <img src="/img/window.png" alt="window" class="img-responsive">
                <span>Дизайнерское оформление более 30 видов</span>
            </div>
            <div class="col-md-3 text-center advantage-item">
                <img src="/img/prise.png" alt="prise" class="img-responsive">
                <span>Срок службы окон <br>50 лет</span>
            </div>
        </div>
    </div>
</section>

<section class="section section-steps">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Как мы изготовим вам окна</h2>
                <div class="step-wrap">
                    <div class="step-item media">
                        <div class="step-img media-left media-middle">
                            <img class="media-object" src="/img/step1.png" alt="step-1">
                        </div>
                        <div class="step-desc media-body">
                            <h3 class="media-heading">.01</h3>
                            <div class="col-md-8">
                                <p>Сделайте расчёт своего заказа</p>
                                <p class="decription">Для расчета перейдите к <a href="<?=Url::to(['site/calculate/window']); ?>">калькулятору</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="step-item media">
                        <div class="step-desc media-body text-right">
                            <h3 class="media-heading">.02</h3>
                            <div class="col-md-8 step-desc-wrap">
                                <p>Отправте заявку на заказ</p>
                                <p class="decription">После расчета параметров окна или двери, кликните кнопку «Заказать»</p>
                            </div>
                        </div>
                        <div class="step-img media-right media-middle">
                            <img class="media-object" src="/img/step1.png" alt="step-2">
                        </div>
                    </div>
                    <div class="step-item media">
                        <div class="step-img media-left media-middle">
                            <img class="media-object" src="/img/step3.png" alt="step-3">
                        </div>
                        <div class="step-desc media-body">
                            <h3 class="media-heading">.03</h3>
                            <div class="col-md-8">
                                <p>Наш менеджер свяжется с вами для уточнения деталей</p>
                                <p class="decription">Наш специалист перезвонит вам для подтверждения заказа.</p>
                            </div>
                        </div>
                    </div>
                    <div class="step-item media">
                        <div class="step-desc media-body text-right">
                            <h3 class="media-heading">.04</h3>
                            <div class="col-md-8 step-desc-wrap">
                                <p>Получите ваш заказ</p>
                                <p class="decription">Мы изготавливам для вас окна или двери. При необходимости осуществляем доставку на объект и монтаж.</p>
                            </div>
                        </div>
                        <div class="step-img media-right media-middle">
                            <img class="media-object" src="/img/step4.png" alt="step-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?=$this->render('slider'); ?>

<section class="section section-calculate">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-4">
                <div class="calculate-desc">
                    <h2>Индивидуальный расчет</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <a href="<?=Url::to(['/site/calculate/window'])?>" class="btn btn-default">Рассчитать стоимость</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-about">
    <div class="container">
        <h2 class="text-center">О компании <?=Yii::$app->params['siteName']; ?></h2>
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">Наша компания предлагает только качественные товары. Мы работаем только с проверенными производителями. Мы даем гарантию на каждый товар, который Вы выбрали. Мы предлагаем Вам всевозможные решения Ваших пожеланий. Всегда у нас для Вас акционные предложения, скидки и подарки. В нашем магазине Вы всегда приобретаете товар  напрямую от производителя, не переплачивая дилерские наценки. Все пожелания и требования будут выполняться в кратчайшие сроки. Мы работаем для Вас. От Вашего комфорта зависит  наше будущее.</p>
            </div>
        </div>
    </div>
</section>