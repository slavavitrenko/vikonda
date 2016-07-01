<?php

$this->registerJsFile('/js/bee3D.js');


$js = "window.onload = function() {
    /*=======---bee3d slider---=======*/
    var demo = document.getElementById('demo');

    var slider = new Bee3D(demo, {
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
};";

$this->registerJs($js, \yii\web\View::POS_END);

$js = "
    $('#slider').slick({
        dots: false,
        infinite: true,
        autoplay: true,
        speed: 1200,
        cssEase: 'linear',
        autoplaySpeed: 5000
    });


    $('#about').css('opacity', 0);
    $('#about').waypoint(function() {
        $('#about').addClass('animated rollIn').css('opacity', 1);
    }, { offset: '55%'});
    $('#about h1').css('opacity', 0);
    $('#about h1').waypoint(function() {
        $('#about h1').addClass('animated flipInX').css('opacity', 1);
    }, { offset: '70%'});
    $('#steps h1').css('opacity', 0);
    $('#steps h1').waypoint(function() {
        $('#steps h1').addClass('animated flipInY').css('opacity', 1);
    }, { offset: '57%'});
    $('#products h1').css('opacity', 0);
    $('#products h1').waypoint(function() {
        $('#products h1').addClass('animated flipInY').css('opacity', 1);
    }, { offset: '57%'});
    $('#calculate h1').css('opacity', 0);
    $('#calculate h1').waypoint(function() {
        $('#calculate h1').addClass('animated flipInY').css('opacity', 1);
    }, { offset: '57%'});
    $('#calculate .calculate-image').css('opacity', 0);
    $('#calculate .calculate-image').waypoint(function() {
        $('#calculate .calculate-image').addClass('animated fadeInLeft').css('opacity', 1);
    }, { offset: '60%'});
    $('#calculate .calculate-desc').css('opacity', 0);
    $('#calculate .calculate-desc').waypoint(function() {
        $('#calculate .calculate-desc').addClass('animated fadeInRight').css('opacity', 1);
    }, { offset: '60%'});
    
    $('#step-block-1').css('opacity', 0);
    $('#step-block-1').waypoint(function() {
        $('#step-block-1').addClass('animated fadeInLeft');
    }, { offset: '57%'});
    $('#step-block-2').css('opacity', 0);
    $('#step-block-2').waypoint(function() {
        $('#step-block-2').addClass('animated fadeInRight');
    }, { offset: '57%'});
    $('#step-block-3').css('opacity', 0);
    $('#step-block-3').waypoint(function() {
        $('#step-block-3').addClass('animated fadeInLeft');
    }, { offset: '57%'});
    $('#step-block-4').css('opacity', 0);
    $('#step-block-4').waypoint(function() {
        $('#step-block-4').addClass('animated fadeInRight');
    }, { offset: '57%'});";

    $this->registerJs($js, \yii\web\View::POS_READY);
?>

<section class="section-slider">
    <div id="slider" class="slider">
        <div class="slider-item"><img class="img-responsive" src="/img/img1.jpg" alt="slider-img"></div>
        <div class="slider-item"><img class="img-responsive" src="/img/img1.jpg" alt="slider-img"></div>
    </div>
</section>

<section id="about" class="section-about">
    <div class="container about-wrapper">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>О компании</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam et fuga fugit impedit in iure iusto molestias,
                    natus nulla, odio quod sit, tenetur veritatis! Cupiditate eos explicabo iusto praesentium voluptates.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus dolor doloribus facilis id, ipsum rem. Amet architecto consequuntur debitis, doloribus eos, excepturi neque officia praesentium quibusdam quisquam quod sed, voluptas?
                </p>
            </div>
        </div>
    </div>
</section>
<section id="steps" class="section-step">
    <h1>Шаги производства</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="step-block-1" class="step-block">
                    <div class="step-img-wrapper">
                        <div class="image-block">

                        </div>
                    </div>
                    <div class="step-desc">
                        <h2 class="step-desc-title">Шаг 1</h2>
                        <p class="step-desc-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae commodi eaque
                            explicabo hic ipsam iure libero nisi, recusandae similique vero?</p>
                    </div>
                </div>
                <div id="step-block-2" class="step-block">
                    <div class="step-desc">
                        <h2 class="step-desc-title">Шаг 2</h2>
                        <p class="step-desc-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae commodi eaque
                            explicabo hic ipsam iure libero nisi, recusandae similique vero?</p>
                    </div>
                    <div class="step-img-wrapper">
                        <div class="image-block">

                        </div>
                    </div>
                </div>
                <div id="step-block-3" class="step-block">
                    <div class="step-img-wrapper">
                        <div class="image-block">

                        </div>
                    </div>
                    <div class="step-desc">
                        <h2 class="step-desc-title">Шаг 3</h2>
                        <p class="step-desc-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae commodi eaque
                            explicabo hic ipsam iure libero nisi, recusandae similique vero?</p>
                    </div>
                </div>
                <div id="step-block-4" class="step-block">
                    <div class="step-desc">
                        <h2 class="step-desc-title">Шаг 4</h2>
                        <p class="step-desc-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae commodi eaque
                            explicabo hic ipsam iure libero nisi, recusandae similique vero?</p>
                    </div>
                    <div class="step-img-wrapper">
                        <div class="image-block">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?=$this->render('@app/views/site/slider');?>
<section id="calculate" class="section-calculate">
    <h1>Индивидуальный расчет</h1>
    <div class="container">
        <div class="calculator-wrapper">
            <div class="row">
                <div class="col-md-4">
                    <div class="calculate-image">
                        <a href=""><img class="img-responsive" src="http://placehold.it/250x250" alt=""></a>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="calculate-desc">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Accusamus consectetur consequatur dolor eligendi incidunt necessitatibus nisi odio provident quam, repellat rerum temporibus ullam vel.
                            Dolorem facilis minus nesciunt quaerat? Atque, commodi ducimus esse et,
                            laborum, nobis nostrum officiis omnis optio quaerat quo reiciendis rem repellendus sed voluptatibus.
                            In tempora, voluptates?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="footer">
    <div class="line"></div>
    <div class="top-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-nav">
                        <ul>
                            <li><a href="">Главная</a></li>
                            <li><a href="">Товар</a></li>
                            <li><a href="">Калькулятор</a></li>
                            <li><a href="">Контакты</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-desc">
                        <h4>О нас</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, dolores doloribus eligendi explicabo facere ipsum labore molestiae praesentium vel vero.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-contact">
                        <ul>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i><span><a href="mailto:<?=\app\models\Settings::get('admin_email'); ?>"><?=\app\models\Settings::get('admin_email'); ?></a></span></li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i><span><a href="skype:+380999999999?call">+38 (099) 999 99 99</a></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bot-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="copy">&copy; UnicWeb 2016</div>
                </div>
                <div class="col-md-6">
                    <div class="social">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-vk" aria-hidden="true"></i></a></li>
                            <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href=""><i class="fa fa-odnoklassniki" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>