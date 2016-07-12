<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\SiteAsset;

SiteAsset::register($this);

$this->title = Yii::t('app', 'Home');

$this->registerJsFile('/js/bee3D.js');


$js = '
    $(".section-advantages").css("opacity", 0);
    $(".section-advantages").waypoint(function() {
        $(".section-advantages").addClass("animated zoomIn").css("opacity", 1);
    }, {offset: "65%"});
    $(".section-steps h2").css("opacity", 0);
    $(".section-steps h2").waypoint(function() {
        $(".section-steps h2").addClass("animated bounceInUp").css("opacity", 1);
    }, {offset: "65%"});
    $(".section-popular-prod h2").css("opacity", 0);
    $(".section-popular-prod h2").waypoint(function() {
        $(".section-popular-prod h2").addClass("animated bounceInUp").css("opacity", 1);
    }, {offset: "65%"});
    $(".section-calculate h2").css("opacity", 0);
    $(".section-calculate h2").waypoint(function() {
        $(".section-calculate h2").addClass("animated bounceInUp").css("opacity", 1);
    }, {offset: "65%"});
    $(".section-about h2").css("opacity", 0);
    $(".section-about h2").waypoint(function() {
        $(".section-about h2").addClass("animated bounceInUp").css("opacity", 1);
    }, {offset: "65%"});
    $(".section-steps .step-item").css("opacity", 0);
    $(".section-steps .step-item").waypoint(function() {
        $(".section-steps .step-item").addClass("animated rollIn").css("opacity", 1);
    }, {offset: "65%"});
    $(".section-calculate p, .section-calculate a").css("opacity", 0);
    $(".section-calculate p, .section-calculate a").waypoint(function() {
        $(".section-calculate p, .section-calculate a").addClass("animated bounceInRight").css("opacity", 1);
    }, {offset: "65%"});
    $(".section-about p").css("opacity", 0);
    $(".section-about p").waypoint(function() {
        $(".section-about p").addClass("animated bounceInUp").css("opacity", 1);
    }, {offset: "65%"});
';

$this->registerJs($js, \yii\web\View::POS_END);

$js = "

        $('#slider').slick({
        dots: false,
        arrows: true,
        infinite: true,
        autoplay: true,
        speed: 1200,
        cssEase: 'linear',
        autoplaySpeed: 5000
    });


    var bee3d = document.getElementById('bee3d');

    var slider = new Bee3D(bee3d, {
        effect: 'coverflow',
        focus: 2,
        navigation: {
            enabled: true
        },
        autoplay: {
            enabled: true,
            pauseHover: true
        },
        loop: {
            enabled: true,
            continuous: true,
        }
    });
    
";

$this->registerJs($js, \yii\web\View::POS_READY);

?>

<section id="slider" class="section-slider">
    <div class="slider-item slider-item-1">
        <div class="row">
            <div class="col-md-5 col-sm-6 col-sm-offset-1">
                <div class="slider-desc">
                    <h2>Окна</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequuntur cupiditate dolorum
                        excepturi id minima placeat. Id laborum repudiandae voluptates.</p>
                    <a href="/category/19" class="btn btn-default">Посмотреть каталог окон</a>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-item slider-item-2">
        <div class="row">
            <div class="col-md-5 col-sm-6 col-sm-offset-1">
                <div class="slider-desc">
                    <h2>Двери</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequuntur cupiditate dolorum
                        excepturi id minima placeat. Id laborum repudiandae voluptates.</p>
                    <a href="/category/20" class="btn btn-default">каталог дверей</a>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-item slider-item-3">
        <div class="row">
            <div class="col-md-5 col-sm-6 col-sm-offset-1">
                <div class="slider-desc">
                    <h2>Кондиционеры</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequuntur cupiditate dolorum
                        excepturi id minima placeat. Id laborum repudiandae voluptates.</p>
                    <a href="/category/24" class="btn btn-default">каталог кондиционеров</a>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-item slider-item-4">
        <div class="row">
            <div class="col-md-5 col-sm-6 col-sm-offset-1">
                <div class="slider-desc">
                    <h2>Бензо и электро инструмент</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequuntur cupiditate dolorum
                        excepturi id minima placeat. Id laborum repudiandae voluptates.</p>
                    <a href="/category/25" class="btn btn-default">каталог инструментов</a>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-item slider-item-5">
        <div class="row">
            <div class="col-md-5 col-sm-6 col-sm-offset-1">
                <div class="slider-desc">
                    <h2>Стройматериалы</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consequuntur cupiditate dolorum
                        excepturi id minima placeat. Id laborum repudiandae voluptates.</p>
                    <a href="/category/26" class="btn btn-default">каталог стройматериалов</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-advantages">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <p class="text-center"><b>Уважаемые</b> посетители нашего сайта, Вы сможете максимально удобно, <b>не выходя из дома</b>, в любую погоду и любое время, <b>ознакомиться</b> со всем перечнем предлагаемых нами  товаров и <b>заказать</b> их <b>в любом уголке Украины</b>. Наша компания предлагает только <b>качественные товары</b>. Мы работаем только с <b>проверенными производителями</b>. Мы даем <b>гарантию</b> на каждый товар, который Вы выбрали. Мы предлагаем Вам всевозможные решения Ваших пожеланий. Всегда у нас для Вас <b>акционные предложения, скидки и подарки</b>. В нашем магазине Вы всегда приобретаете товар  напрямую от производителя, <b>не переплачивая</b> дилерские наценки. Все пожелания и требования будут <b>выполняться в кратчайшие сроки</b>. Мы работаем для Вас. От Вашего комфорта зависит  наше будущее.</p>
            </div>
        </div>
    </div>
</section>

<section class="section section-steps">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Как мы выполним Ваш заказ</h2>
                <div class="step-wrap">
                    <div class="step-item media">
                        <div class="step-img media-left media-middle">
                            <img class="media-object" src="/img/step1.png" alt="step-1">
                        </div>
                        <div class="step-desc media-body">
                            <div class="col-md-8">
                                <p>Сделайте расчёт Вашего заказа</p>
                                <p class="decription">Для расчета перейдите к <a href="/site/calculate/window">калькулятору</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="step-item media">
                        <div class="step-desc media-body text-right">
                            <div class="col-md-8 step-desc-wrap">
                                <p>Отправте заявку на заказ</p>
                                <p class="decription">После расчета кликните кнопку «Отправить заявку»</p>
                            </div>
                        </div>
                        <div class="step-img media-right media-middle">
                            <img class="media-object" src="/img/step2.jpg" alt="step-2">
                        </div>
                    </div>
                    <div class="step-item media">
                        <div class="step-img media-left media-middle">
                            <img class="media-object" src="/img/step3.png" alt="step-3">
                        </div>
                        <div class="step-desc media-body">
                            <div class="col-md-8">
                                <p>Наш менеджер свяжется с Вами для уточнения деталей</p>
                                <p class="decription">Наш специалист перезвонит Вам.</p>
                            </div>
                        </div>
                    </div>
                    <div class="step-item media">
                        <div class="step-desc media-body text-right">
                            <div class="col-md-8 step-desc-wrap">
                                <p>Получите Ваш заказ</p>
                                <p class="decription">Ваш заказ будет доставлен Вам любым доступным способом.</p>
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
            <div class="col-md-8 col-md-offset-4 col-sm-12">
                <div class="calculate-desc">
                    <h2>Заходи, считай, заказывай, получай</h2>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
                    <a href="<?=Url::to(['/site/calculate/window'])?>" class="btn btn-default">Рассчитать стоимость</a>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section section-about">
    <div class="container">
        <h2 class="text-center"><?=Yii::$app->params['siteName']; ?></h2>
    </div>
</section>