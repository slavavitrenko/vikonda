$(document).ready(function() {
// announcing the variables
    var picImg = $('.wcalc__frame .pic'),
        picImgRev = $('.wcalc__frame .pic-rev'),
        picImgSec = $('.wcalc__frame .pic-sec'),
        picImgThird = $('.wcalc__frame .pic-third'),
        trigger = $('.wcalc__option p'),
        allClasses = 'active effect-1 effect-2 effect-1-reverse effect-2-reverse effect-3';

    $('.wcalc__icons .gal-icon').on('click', function() {
      var panelToShow = $(this).attr('rel');

      $('.gal-icon.checked').removeClass('checked');
      $(this).addClass('checked');

      $('.wcalc__box.isframe').removeClass('isframe');
      $('.'+panelToShow).addClass('isframe');
      $('.wcalc__frame img').removeClass(allClasses);

    })

    trigger.on('click', function() {
        $('.checked').removeClass('checked');
        $(this).addClass('checked');
    });
    $('.closed').on('click', function() {
        picImg.removeClass(allClasses);
    });
    $('.closed-sec').on('click', function() {
        picImgSec.removeClass(allClasses);
    });
    $('.closed-rev').on('click', function() {
        picImgRev.removeClass(allClasses);
    });
    $('.closed-third').on('click', function() {
        picImgThird.removeClass(allClasses);
    });
    $('.turn-left').on('click', function() {
        picImgRev.removeClass(allClasses);
        picImgRev.addClass('active effect-1-reverse');
    });
    $('.turn-left-sec').on('click', function() {
        picImgSec.removeClass(allClasses);
        picImgSec.addClass('active effect-1-reverse');
    });
    $('.turn-right').on('click', function() {
        picImg.removeClass(allClasses);
        picImg.addClass('active effect-1');
    });
    $('.turn-down').on('click', function() {
        picImg.removeClass(allClasses);
        picImg.addClass('active effect-2');
    });
    $('.turn-down-rev').on('click', function() {
        picImgRev.removeClass(allClasses);
        picImgRev.addClass('active effect-2-reverse');
    });
    $('.turn-down-sec').on('click', function() {
        picImgSec.removeClass(allClasses);
        picImgSec.addClass('active effect-2-reverse');
    });
    $('.turn-down-third').on('click', function() {
        picImgThird.removeClass(allClasses);
        picImgThird.addClass('active effect-3');
    });

//slider code

    //vertical sliders

    $("#sliderVone")

    .slider({
        min: 1000,
        max: 1650,
        orientation: "vertical"
    })

    .slider("pips", {
        step: "10"
    });

    $("#sliderVtwo")

    .slider({
        min: 1500,
        max: 2200,
        orientation: "vertical"
    })

    .slider("pips", {
        step: "10"
    });

    $("#sliderVthree")

    .slider({
        min: 950,
        max: 2200,
        orientation: "vertical"
    })

    .slider("pips", {
        step: "10"
    });

    //horizontal sliders

    $("#sliderHone")

    .slider({
        min: 400,
        max: 1400
      })

    .slider("pips", {
        step: "20"
    });

    $("#sliderHtwo")

    .slider({
        min: 1000,
        max: 1700
      })

    .slider("pips", {
        step: "10"
    });

    $("#sliderHthree")

    .slider({
        min: 1700,
        max: 2700
      })

    .slider("pips", {
        step: "10"
    });

    $("#sliderHfour")

    .slider({
        min: 600,
        max: 850
      })

    .slider("pips", {
        step: "10"
    });

    $("#sliderHfive")

    .slider({
        min: 1850,
        max: 2400
      })

    .slider("pips", {
        step: "10"
    });

    //slider events

    $('.wcalc__icons .wcalc-icon--1').on('click', function() {
      $('.slider').addClass('noframe');
      $('#sliderVone').removeClass('noframe');
      $('#sliderHone').removeClass('noframe');
    });

    $('.wcalc__icons .wcalc-icon--2').on('click', function() {
      $('.slider').addClass('noframe');
      $('#sliderVone').removeClass('noframe');
      $('#sliderHtwo').removeClass('noframe');
    });

    $('.wcalc__icons .wcalc-icon--3').on('click', function() {
      $('.slider').addClass('noframe');
      $('#sliderVtwo').removeClass('noframe');
      $('#sliderHtwo').removeClass('noframe');
    });

    $('.wcalc__icons .wcalc-icon--4').on('click', function() {
      $('.slider').addClass('noframe');
      $('#sliderVone').removeClass('noframe');
      $('#sliderHthree').removeClass('noframe');
    });

    $('.wcalc__icons .wcalc-icon--5').on('click', function() {
      $('.slider').addClass('noframe');
      $('#sliderVthree').removeClass('noframe');
      $('#sliderHfour').removeClass('noframe');
    });

    $('.wcalc__icons .wcalc-icon--6').on('click', function() {
      $('.slider').addClass('noframe');
      $('#sliderVthree').removeClass('noframe');
      $('#sliderHfive').removeClass('noframe');
    });

});
