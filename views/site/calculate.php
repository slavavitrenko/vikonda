<?php

use app\assets\CalcAsset;

\app\assets\CalcAsset::register($this);

$this->title = Yii::t('app', 'Calculator');

?>


<body>

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
    <div class="col bordered"><a class="btn btn-block" href="#">Окна</a></div>
    <div class="col bordered"><a class="btn btn-block" href="#">Двери</a></div>
    <div class="col bordered"><a class="btn btn-block" href="#">Комплектующие</a></div>
    <div class="col bordered"><a class="btn btn-block" href="#">Сервис и услуги</a></div>
    <div class="col bordered"><a class="btn btn-block" href="#">Акции</a></div>
    <div class="col bordered"><a class="btn btn-block" href="#">О компании</a></div>
  </div>
</div>
<div class="announce container-fluid">
  <div class="row">
    <div class="col-12 col-md-8 announce__item">
      <div class="row">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="/images/Screenshot_2.png" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="/images/Screenshot_2.png" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="/images/Screenshot_2.png" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4 announce__item">
      <div class="row">
        <img class="img-fluid" src="/images/Screenshot_1.png" alt="">
      </div>
    </div>
  </div>
</div>
<div class="call-up container-fluid">
  <div class="row align-items-center">
    <div class="col-12 col-md-4 text-center">
      <h3 class="font-weight-bold">Рассчитаем окна за 5 минут</h3>
      <p>Перезвоним и поможем с расчетом Ваших окон</p>
    </div>
    <div class="col-12 col-md-8">
      <form class="form-inline form-custom justify-content-center">
        <label class="sr-only" for="inlineFormInput">Name</label>
        <input type="text" class="form-control text-center" id="inlineFormInput" placeholder="Имя">

        <label class="sr-only" for="inlineFormInputGroup">Username</label>
        <input type="text" class="form-control text-center" id="inlineFormInputGroup" placeholder="Телефон">

        <button type="submit" class="btn btn-call">Позвонить</button>
      </form>
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
    <div class="col text-center">
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
      <button type="submit" class="btn btn-calculate">рассчитать</button>
    </div>
    <div class="col text-center">
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
      <button type="submit" class="btn btn-calculate">рассчитать</button>
    </div>
    <div class="col text-center">
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
      <button type="submit" class="btn btn-calculate">рассчитать</button>
    </div>
    <div class="col text-center">
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
      <button type="submit" class="btn btn-calculate">рассчитать</button>
    </div>
  </div>
</div>
<!-- Start Windows -->
<div class="wcalc">

  <div class="form-group custom-form-group">
    <div class="form-check custom-form-check">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
        <h4>Тип окна</h4>
      </label>
    </div>
    <div class="form-check custom-form-check">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
        <img src="/wincalc/images/fn1.png" alt="">
      </label>
    </div>
    <div class="form-check custom-form-check">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
        <img src="/wincalc/images/fn2.png" alt="">
      </label>
    </div>
    <div class="form-check custom-form-check">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
        <img src="/wincalc/images/fn3.png" alt="">
      </label>
    </div>
    <div class="form-check custom-form-check">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
        <img src="/wincalc/images/fn4.png" alt="">
      </label>
    </div>
    <div class="form-check custom-form-check">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
        <img src="/wincalc/images/fn5.png" alt="">
      </label>
    </div>
    <div class="form-check custom-form-check">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
        <img src="/wincalc/images/fn6.png" alt="">
      </label>
    </div>
  </div>

  <div class="wcalc__profile">
    <div class="new-radio1">
      <div class="form-group">
        <legend>Выбор профиля</legend>
        <div class="form-check form-check-new">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked>
            Эконом
            <span class="size-radio">Профиль 3 камеры, 2 стекла</span>
          </label>
        </div>
        <div class="form-check form-check-new">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked>
            Стандарт
            <span class="size-radio">Профиль 4 камеры, 3 стекла</span>
          </label>
        </div>
        <div class="form-check form-check-new">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked>
            Премиум
            <span class="size-radio">Профиль 5 камеры, 3 стекла</span>
          </label>
        </div>
        <div class="form-check form-check-new">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked>
            Элит
            <span class="size-radio">Профиль 6 камеры, 3 стекла</span>
          </label>
        </div>
      </div>
    </div>
  </div>

  <div class="wcalc__measures">
    <div class="wcalc__size">
      <h4 class="wcalc__heading">Размеры</h4>
      <ul>
        <li>
          <form action="">
            <p>Высота</p>
            <input type="text" size="4" name="" value="">&nbsp мм
            <p>Ширина</p>
            <input type="text" size="4" name="" value="">&nbsp мм
          </form>
        </li>
      </ul>
      <ul>
        <li>
          <form action="">
            <p><input type="checkbox" name="" id=""><b>Монтаж</b><br>
              <span>+3462 руб.</span></p>
            <p><input type="checkbox" name="" id=""><b>Подоконник</b><br>
              <span>+1559 руб.</span></p>
            <p><input type="checkbox" name="" id=""><b>Откосы</b><br>
              <span>+2702 руб.</span></p>
          </form>
        </li>
      </ul>
    </div>
  </div>

  <div class="wcalc__models">
    <h4 class="wcalc__heading">
      Тип открывания
    </h4>

    <div id="sliderVone" class="slider left-float noframe"></div>
    <div id="sliderVtwo" class="slider left-float noframe"></div>
    <div id="sliderVthree" class="slider left-float noframe"></div>

    <div class="wcalc__box wcalc__box--1 isframe">
      <div class="wcalc__frame wcalc__frame--1">
        <img class="pic" src="/wincalc/images/f42.png" alt="">
        <div class="wcalc__option wcalc__option--1">
          <p class="closed checked">глухое</p>
          <p class="turn-right">поворотное</p>
          <p class="turn-down">поворотно-откидное</p>
        </div>
      </div>
    </div>

    <div class="wcalc__box wcalc__box--2">
      <div class="wcalc__frame wcalc__frame--2 left-float">
        <img class="pic-rev" src="/wincalc/images/f41.png" alt="">
        <div class="wcalc__option wcalc__option--1">
          <p class="closed-rev checked">глухое</p>
          <p class="turn-left">поворотное</p>
          <p class="turn-down-rev">поворотно-откидное</p>
        </div>
      </div>
      <div class="wcalc__frame wcalc__frame--1">
        <img class="pic" src="/wincalc/images/f42.png" alt="">
        <div class="wcalc__option wcalc__option--2">
          <p class="closed checked">глухое</p>
          <p class="turn-right">поворотное</p>
          <p class="turn-down">поворотно-откидное</p>
        </div>
      </div>
    </div>

    <div class="wcalc__box wcalc__box--3">
      <div class="wcalc__frame wcalc__frame--3">
        <img class="pic-third" src="/wincalc/images/f33.png" alt="">
        <div class="wcalc__option wcalc__option--1">
          <p class="closed-third checked">глухое</p>
          <p class="turn-down-third">поворотное</p>
        </div>
      </div>
      <div class="wcalc__frame wcalc__frame--2 left-float">
        <img class="pic-rev" src="/wincalc/images/f31.png" alt="">
        <div class="wcalc__option wcalc__option--1">
          <p class="closed-rev checked">глухое</p>
          <p class="turn-left">поворотное</p>
          <p class="turn-down">поворотно-откидное</p>
        </div>
      </div>
      <div class="wcalc__frame wcalc__frame--1">
        <img class="pic" src="/wincalc/images/f32.png" alt="">
        <div class="wcalc__option wcalc__option--2">
          <p class="closed checked">глухое</p>
          <p class="turn-right">поворотное</p>
          <p class="turn-down">поворотно-откидное</p>
        </div>
      </div>
    </div>

    <div class="wcalc__box wcalc__box--4">
      <div class="wcalc__frame wcalc__frame--2 left-float">
        <img class="pic-rev" src="/wincalc/images/f41.png" alt="">
        <div class="wcalc__option wcalc__option--1">
          <p class="closed-rev checked" class="checked">глухое</p>
          <p class="turn-left">поворотное</p>
          <p class="turn-down">поворотно-откидное</p>
        </div>
      </div>
      <div class="wcalc__frame wcalc__frame--2 left-float">
        <img class="pic-sec" src="/wincalc/images/f41.png" alt="">
        <div class="wcalc__option wcalc__option--2">
          <p class="closed-sec checked">глухое</p>
          <p class="turn-left-sec">поворотное</p>
          <p class="turn-down-sec">поворотно-откидное</p>
        </div>
      </div>
      <div class="wcalc__frame wcalc__frame--1">
        <img class="pic" src="/wincalc/images/f42.png" alt="">
        <div class="wcalc__option wcalc__option--2">
          <p class="closed checked">глухое</p>
          <p class="turn-right">поворотное</p>
          <p class="turn-down">поворотно-откидное</p>
        </div>
      </div>
    </div>

    <div class="wcalc__box wcalc__box--5">

    </div>

    <div class="wcalc__box wcalc__box--6">
      <div class="wcalc__frame wcalc__frame--2 left-float">
        <img class="pic-rev" src="/wincalc/images/f31.png" alt="">
        <div class="wcalc__option wcalc__option--1">
          <p class="closed-rev checked">глухое</p>
          <p class="turn-left">поворотное</p>
          <p class="turn-down">поворотно-откидное</p>
        </div>
      </div>
      <div class="wcalc__frame wcalc__frame--1">
        <img class="pic" src="/wincalc/images/f32.png" alt="">
        <div class="wcalc__option wcalc__option--3">
          <p class="closed checked">глухое</p>
          <p class="turn-right">поворотное</p>
          <p class="turn-down">поворотно-откидное</p>
        </div>
      </div>
    </div>

    <div id="sliderHone" class="slider noframe"></div>
    <div id="sliderHtwo" class="slider noframe"></div>
    <div id="sliderHthree" class="slider noframe"></div>
    <div id="sliderHfour" class="slider noframe"></div>
    <div id="sliderHfive" class="slider noframe"></div>
  </div>
</div>
<!-- End Windows -->

<div class="order container-fluide">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
      <h1>Отправьте расчет на оцеку
        и получите дополнительную
        скидку 10% на приобритение
        москитной сетки</h1>
    </div>
    <div class="col-md-6 col-lg-5">
      <form class="form-order">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><img src="/images/Path 15.png" alt=""></span>
            <input type="text" class="form-control" id="inputName" placeholder="Имя">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><img src="/images/Image 34.png" alt=""></span>
            <input type="tel" class="form-control" id="inputPhone" placeholder="Номер телефона">
          </div>
        </div>
        <div class="form-group">
          <select class="custom-select">
            <option selected>Город</option>
            <option value="1">Полтава</option>
            <option value="2">Киев</option>
            <option value="3">Харьков</option>
          </select>
        </div>
        <button type="submit" class="btn btn-order">Отправить расчет</button>
      </form>
    </div>
  </div>
</div>

