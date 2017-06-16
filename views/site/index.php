<?php


use \yii\helpers\ArrayHelper;
use app\models\Regions;
use \yii\helpers\Html;
use \yii\widgets\ActiveForm;

$this->title = Yii::t('app', 'Home');
?>

<div class="call-up container-fluid">
    <div class="row align-items-center">
        <div class="col-12 col-md-4 text-center">
            <h3 class="font-weight-bold">Рассчитаем окна за 5 минут</h3>
            <p>Перезвоним и поможем с расчетом Ваших окон</p>
        </div>
        <div class="col-12 col-md-8">
            <div class="row">
                <?php $form = ActiveForm::begin([
                    'action' => ['/site/call'],
                    'method' => 'post',
                    'options' => [
                        'class' => 'form-inline form-custom justify-content-center'
                    ],
                ]); ?>
                <div class="col-12 col-lg-4">
                    <label class="sr-only" for="inlineFormInput">Name</label>
                    <input type="text" name = "name" class="form-control text-center" id="inlineFormInput" placeholder="Имя">
                </div>

                <div class="col-12 col-lg-4">
                    <label class="sr-only" for="inlineFormInputGroup">Username</label>
                    <input type="text" name = "phone" class="form-control text-center" id="inlineFormInputGroup" placeholder="Телефон">
                </div>

                <div class="col-12 col-lg-4">
                    <button type="submit" class="btn btn-call btn-block">Позвонить</button>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<div class="calculator container-fluid">
    <div class="row">
        <div class="col">
            <h1 class="text-center">Цены на пластиковые окна в Украине</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3 text-center">
            <h2>Эконом</h2>
            <div class="w-100">
                <img src="/images/frame.png" alt="">
            </div>
            <div class="w-100">
                <img src="/images/line2.jpg" alt="">
            </div>
            <div class="w-100">
                <img src="/images/Path 14.png" alt="">
            </div>
            <div class="w-100">
                <img src="/images/Image 30.png" alt="" style="opacity: 0.20">
            </div>
            <button type="submit" value = "econom" class="btn btn-calculate">рассчитать</button>
        </div>
        <div class="col-12 col-sm-6 col-md-3 text-center">
            <h2>Стандарт</h2>
            <div class="w-100">
                <img src="/images/frame.png" alt="">
            </div>
            <div class="w-100">
                <img src="/images/line3.jpg" alt="">
            </div>
            <div class="w-100">
                <img src="/images/Path 13.png" alt="">
            </div>
            <div class="w-100">
                <img src="/images/Image 31.png" alt="" style="opacity: 0.50">
            </div>
            <button type="submit" value = "standart" class="btn btn-calculate">рассчитать</button>
        </div>
        <div class="col-12 col-sm-6 col-md-3 text-center">
            <h2>Премиум</h2>
            <div class="w-100">
                <img src="/images/frame.png" alt="">
            </div>
            <div class="w-100">
                <img src="/images/line4.jpg" alt="">
            </div>
            <div class="w-100">
                <img src="/images/Path -1.png" alt="">
            </div>
            <div class="w-100">
                <img src="/images/Image 32.png" alt=""  style="opacity: 0.70">
            </div>
            <button type="submit" value = "premium" class="btn btn-calculate">рассчитать</button>
        </div>
        <div class="col-12 col-sm-6 col-md-3 text-center">
            <h2>Элит</h2>
            <div class="w-100">
                <img src="/images/frame.png" alt="">
            </div>
            <div class="w-100">
                <img src="/images/line.png" alt="">
            </div>
            <div class="w-100">
                <img src="/images/Path 8.png" alt="">
            </div>
            <div class="w-100">
                <img src="/images/Image 33.png" alt="">
            </div>
            <button type="submit" value = "elite" class="btn btn-calculate">рассчитать</button>
        </div>
    </div>
</div>


<?php $form = ActiveForm::begin([
    'action' => ['/site/calculate'],
    'method' => 'post'
]); ?>
<!-- Start Windows -->
<div class="wcalc">
    <div class="form-group custom-form-group wcalc__icons">
        <div class="form-check custom-form-check">
            <h4>Тип окна</h4>
        </div>
        <div rel="wcalc__box--1" class="form-check custom-form-check checked-icon gal-icon wcalc-icon--1 checked">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" checked = "checked" data-min-height = "1000" data-max-height = "1650"
                       data-min-width = "400" data-max-width = "1400" name="WindowCalculate[window_type]" id="first" value="1">
                <img src="/wincalc/images/fn1.png" alt="">
            </label>
        </div>
        <div rel="wcalc__box--2" class="form-check custom-form-check gal-icon wcalc-icon--2">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" data-min-height = "1000" data-max-height = "1650"
                       data-min-width = "1000" data-max-width = "1700" name="WindowCalculate[window_type]" id="second" value="2">
                <img src="/wincalc/images/fn2.png" alt="">
            </label>
        </div>
        <div rel="wcalc__box--3" class="form-check custom-form-check gal-icon wcalc-icon--3">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" data-min-height = "1500" data-max-height = "2200"
                       data-min-width = "1000" data-max-width = "1700" name="WindowCalculate[window_type]" id="third" value="3">
                <img src="/wincalc/images/fn3.png" alt="">
            </label>
        </div>
        <div rel="wcalc__box--4" class="form-check custom-form-check gal-icon wcalc-icon--4">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" data-min-height = "1000" data-max-height = "1650"
                       data-min-width = "1700" data-max-width = "2700" name="WindowCalculate[window_type]" id="forth" value="4">
                <img src="/wincalc/images/fn4.png" alt="">
            </label>
        </div>
        <div rel="wcalc__box--5" class="form-check custom-form-check gal-icon wcalc-icon--5">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" data-min-height = "950" data-max-height = "2200"
                       data-min-width = "600" data-max-width = "850" name="WindowCalculate[window_type]" id="fifth" value="5">
                <img src="/wincalc/images/fn5.png" alt="">
            </label>
        </div>
        <div rel="wcalc__box--6" class="form-check custom-form-check gal-icon wcalc-icon--6">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" data-min-height = "950" data-max-height = "2200"
                       data-min-width = "1850" data-max-width = "2400" name="WindowCalculate[window_type]" id="sixth" value="6">
                <img src="/wincalc/images/fn6.png" alt="">
            </label>
        </div>
    </div>

    <div class="wcalc__profile">
        <div class="new-radio1">
            <div class="form-group">
                <legend>Выбор профиля</legend>
                <div class="form-check form-check-new checked">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" checked = "checked" name="WindowCalculate[profile_type]" id="econom" value="Эконом">
                        Эконом
                        <p class="size-radio">Профиль 3 камеры, 2 стекла</p>
                    </label>
                </div>
                <div class="form-check form-check-new">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="WindowCalculate[profile_type]" id="standart" value="Стандарт">
                        Стандарт
                        <p class="size-radio">Профиль 4 камеры, 3 стекла</p>
                    </label>
                </div>
                <div class="form-check form-check-new">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="WindowCalculate[profile_type]" id="premium" value="Премиум">
                        Премиум
                        <p class="size-radio">Профиль 5 камеры, 3 стекла</p>
                    </label>
                </div>
                <div class="form-check form-check-new">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="WindowCalculate[profile_type]" id="elite" value="Элит">
                        Элит
                        <p class="size-radio">Профиль 6 камеры, 3 стекла</p>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="wcalc__measures">
        <div class="wcalc__size">
            <h4 class="wcalc__heading">Размеры</h4>
            <ul>
                <?= $form->field($model, 'height', [
                    'template' => '<li class="form-group">{label}<br>{input}{error}</li>',
                    'inputOptions' => [
                        'size' => '4',
                        'id' => 'height',
                    ]]) ?>

                <?= $form->field($model, 'width', [
                    'template' => '<li class="form-group">{label}<br>{input}{error}</li>',
                    'inputOptions' => [
                        'size' => '4',
                        'id' => 'width'
                    ]]) ?>

            </ul>
        </div>
    </div>

    <div class="wcalc__models">
        <h4 class="wcalc__heading">
            Тип открывания
        </h4>

        <div id="verticalSlider" class="slider left-float isframe"></div>


        <div class="wcalc__box wcalc__box--1 isframe">
            <div class="wcalc__frame wcalc__frame--1">
                <img class="pic" src="/wincalc/images/f42.png" alt="">
                <div class="wcalc__option wcalc__option--1">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" checked = "checked" name="rightSideOption" id="first" value="глухое">
                            <p class="closed checked">глухое</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="rightSideOption" id="second" value="поворотное">
                            <p class="turn-right">поворотное</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="rightSideOption" id="third" value="поворотно-откидное">
                            <p class="turn-down">поворотно-откидное</p>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="wcalc__box wcalc__box--2">
            <div class="wcalc__frame wcalc__frame--2 left-float">
                <img class="pic-rev" src="/wincalc/images/f41.png" alt="">
                <div class="wcalc__option wcalc__option--1">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" =name="leftSideOption" id="first" value="левое глухое">
                            <p class="closed-rev">глухое</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="leftSideOption" id="second" value="левое поворотное">
                            <p class="turn-left">поворотное</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="leftSideOption" id="third" value="левое поворотно-откидное">
                            <p class="turn-down-rev">поворотно-откидное</p>
                        </label>
                    </div>
                </div>
            </div>
            <div class="wcalc__frame wcalc__frame--1">
                <img class="pic" src="/wincalc/images/f42.png" alt="">
                <div class="wcalc__option wcalc__option--2">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input"  name="rightSideOption" id="first" value="правое глухое">
                            <p class="closed ">глухое</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="rightSideOption" id="second" value="правое поворотное">
                            <p class="turn-right">поворотное</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="rightSideOption" id="third" value="правое поворотно-откидное">
                            <p class="turn-down">поворотно-откидное</p>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="wcalc__box wcalc__box--3">
            <div class="wcalc__frame wcalc__frame--3">
                <img class="pic-third" src="/wincalc/images/f33.png" alt="">
                <div class="wcalc__option wcalc__option--1">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="topSideOption" id="first" value="верхнее глухое">
                            <p class="closed-third">глухое</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="topSideOption" id="second" value="верхнее поворотное">
                            <p class="turn-down-third">поворотное</p>
                        </label>
                    </div>
                </div>
            </div>
            <div class="wcalc__frame wcalc__frame--2 left-float">
                <img class="pic-rev" src="/wincalc/images/f31.png" alt="">
                <div class="wcalc__option wcalc__option--1">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input"  name="leftSideOption" id="first" value="левое глухое">
                            <p class="closed-rev">глухое</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="leftSideOption" id="second" value="левое поворотное">
                            <p class="turn-left">поворотное</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="leftSideOption" id="third" value="левое поворотно-откидное">
                            <p class="turn-down-rev">поворотно-откидное</p>
                        </label>
                    </div>
                </div>
            </div>
            <div class="wcalc__frame wcalc__frame--1">
                <img class="pic" src="/wincalc/images/f32.png" alt="">
                <div class="wcalc__option wcalc__option--2">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="rightSideOption" id="first" value="правое глухое">
                            <p class="closed ">глухое</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="rightSideOption" id="second" value="правое поворотное">
                            <p class="turn-right">поворотное</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="rightSideOption" id="third" value="правое поворотно-откидное">
                            <p class="turn-down">поворотно-откидное</p>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="wcalc__box wcalc__box--4">
            <div class="wcalc__frame wcalc__frame--2 left-float">
                <img class="pic-rev" src="/wincalc/images/f41.png" alt="">
                <div class="wcalc__option wcalc__option--1">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="leftSideOption" id="first" value="левое глухое">
                            <p class="closed-rev ">глухое</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="leftSideOption" id="second" value="левое поворотное">
                            <p class="turn-left">поворотное</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="leftSideOption" id="third" value="левое поворотно-откидное">
                            <p class="turn-down-rev">поворотно-откидное</p>
                        </label>
                    </div>
                </div>
            </div>
            <div class="wcalc__frame wcalc__frame--2 left-float">
                <img class="pic-sec" src="/wincalc/images/f41.png" alt="">
                <div class="wcalc__option wcalc__option--2">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="leftSideOption2" id="first" value="центральное глухое">
                            <p class="closed-sec ">глухое</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="leftSideOption2" id="second" value="центральное поворотное">
                            <p class="turn-left-sec">поворотное</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="leftSideOption2" id="third" value="центральное поворотно-откидное">
                            <p class="turn-down-sec">поворотно-откидное</p>
                        </label>
                    </div>
                </div>
            </div>
            <div class="wcalc__frame wcalc__frame--1">
                <img class="pic" src="/wincalc/images/f42.png" alt="">
                <div class="wcalc__option wcalc__option--2">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="rightSideOption" id="first" value="правое глухое">
                            <p class="closed ">глухое</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="rightSideOption" id="second" value="правое поворотное">
                            <p class="turn-right">поворотное</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="rightSideOption" id="third" value="правое поворотно-откидное">
                            <p class="turn-down">поворотно-откидное</p>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="wcalc__box wcalc__box--5">

        </div>

        <div class="wcalc__box wcalc__box--6">
            <div class="wcalc__frame wcalc__frame--2 left-float">
                <img class="pic-rev" src="/wincalc/images/f31.png" alt="">
                <div class="wcalc__option wcalc__option--1">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="leftSideOption" id="first" value="левое глухое">
                            <p class="closed-rev ">глухое</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="leftSideOption" id="second" value="левое поворотное">
                            <p class="turn-left">поворотное</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="leftSideOption" id="third" value="левое поворотно-откидное">
                            <p class="turn-down-rev">поворотно-откидное</p>
                        </label>
                    </div>
                </div>
            </div>
            <div class="wcalc__frame wcalc__frame--1">
                <img class="pic" src="/wincalc/images/f32.png" alt="">
                <div class="wcalc__option wcalc__option--3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="rightSideOption" id="first" value="центральное глухое">
                            <p class="closed ">глухое</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="rightSideOption" id="second" value="центральное поворотное">
                            <p class="turn-right">поворотное</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="rightSideOption" id="third" value="центральное поворотно-откидное">
                            <p class="turn-down">поворотно-откидное</p>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div id="horizontalSlider" class="slider isframe"></div>
    </div>
</div>
<!-- End Windows -->

<div class="order container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <h1>Отправьте рассчет на оцеку
                и получите дополнительную
                скидку 10% на приобретение
                москитной сетки</h1>
        </div>
        <div class="col-md-6 col-lg-5 ">
            <div class="form-order">

                <?= $form->field($model, 'name', [
                    'template' => '<div class="form-group"><div class="input-group"><span class="input-group-addon"><img src="/images/Path 15.png" alt=""></span>{input}</div>{error}</div>',
                    'inputOptions' => [
                        'class' => 'form-control',
                        'placeholder' => 'Имя'
                    ]])->label(false); ?>
                <?= $form->field($model, 'phone', [
                    'template' => '<div class="form-group"><div class="input-group"><span class="input-group-addon"><img src="/images/Image 34.png" alt=""></span>{input}</div>{error}</div>',
                    'inputOptions' => [
                        'class' => 'form-control',
                        'placeholder' => 'Номер телефона'
                    ]])->label(false); ?>
                <?= $form->field($model, 'city')->dropDownList(
                    ArrayHelper::map(Regions::find()->all(), 'name', 'name'),
                    [
                        'prompt' => Yii::t('app', 'Choose city'),
                        'class' => 'custom-select'
                    ]
                )->label(false); ?>
                <button type="submit" class="btn btn-order">Отправить расчет</button>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
