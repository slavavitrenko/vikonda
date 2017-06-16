$(document).ready(function() {
// announcing the variables
    var picImg = $('.wcalc__frame .pic'),
        picImgRev = $('.wcalc__frame .pic-rev'),
        picImgSec = $('.wcalc__frame .pic-sec'),
        picImgThird = $('.wcalc__frame .pic-third'),
        profile = $('.form-check-new'),
        trigger = $('.wcalc__option p'),
        allClasses = 'active effect-1 effect-2 effect-1-reverse effect-2-reverse effect-3';

    $('.wcalc__icons .gal-icon').on('click', function() {
        var panelToShow = $(this).attr('rel');

        $('.custom-form-group').children().removeClass('checked');
        $('.wcalc__frame .checked').removeClass('checked');
        $('.wcalc__frame input[type="radio"]').prop('checked', false);
        $('.' + panelToShow + ' input[type="radio"]').each(function(i, item){
            var item = $(item);
            var value = item.val();
            if(!!~value.indexOf("глухое")){
                item.prop('checked', true);
                item.parent().find('p').addClass('checked');
            }
        });

        $(this).addClass('checked');

        $('.wcalc__box.isframe').removeClass('isframe');
        $('.'+panelToShow).addClass('isframe');
        $('.wcalc__frame img').removeClass(allClasses);

    });

    $('#windowcalculate-city').on('change', function(){
        $('#city').html($(this).val());
    });

    $('.btn-calculate').on('click', function(){
        var value = $(this).val();
        var idValue = $('#' + value);
        $('.form-check-new').removeClass('checked');
        $(idValue).parent().parent().addClass('checked');
    });

    trigger.on('click', function() {
        $(this).parent().parent().parent().find('p').removeClass('checked');
        $(this).addClass('checked');
    });

    var setSliders = function(){
        var data = $("input[name='WindowCalculate[window_type]']:checked").data();

        $( "#verticalSlider" ).slider({
            orientation: "vertical",
            min: data.minHeight,
            max: data.maxHeight,
            value: data.minHeight,
            slide: function( event, ui ) {
                $( "#height" ).val( ui.value );
            }
        }).slider("pips", {
            step: "10"
        });

        $( "#horizontalSlider" ).slider({
            orientation: "horizontal",
            min: data.minWidth,
            max: data.maxWidth,
            value: data.minWidth,
            slide: function( event, ui ) {
                $( "#width" ).val( ui.value );
            }
        }).slider("pips", {
            step: "10"
        });

        $('#verticalSlider').css('height', $('.wcalc__box').height());
        $('#horizontalSlider').css('width', $('.wcalc__box.isframe > .wcalc__frame').width());
        $('#horizontalSlider').css('margin-left', 46);
    };
    setSliders();

    $("input[name='typeOption']").on('change', function(){
        setSliders();
    });

    profile.on('click', function() {
        $('.form-check-new').parent().find('.checked').removeClass('checked');
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

});
