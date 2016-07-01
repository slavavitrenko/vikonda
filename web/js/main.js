;$(document).ready(function() {
    /*=======---slick slider---=======*/
    $("#slider").slick({
        dots: false,
        infinite: true,
        autoplay: true,
        speed: 1200,
        cssEase: 'linear',
        autoplaySpeed: 5000
    });
    
/*=======---animate---=======*/

    $.fn.animateCss = function(animationName, offset){
            // $(this).css('opacity', 0);
            $(this).waypoint(function() {
                $(this).addClass('animated' + animationName).css('opacity', 1);
            }, { offset: offset});
    };
    $("#about").animateCss("rollIn", "57%");


    // $('#about').css('opacity', 0);
    // $("#about").waypoint(function() {
    //     $('#about').addClass('animated rollIn').css('opacity', 1);
    // }, { offset: '55%'});
    // $('#about h1').css('opacity', 0);
    // $("#about h1").waypoint(function() {
    //     $('#about h1').addClass('animated flipInX').css('opacity', 1);
    // }, { offset: '70%'});
    // $('#steps h1').css('opacity', 0);
    // $("#steps h1").waypoint(function() {
    //     $('#steps h1').addClass('animated flipInY').css('opacity', 1);
    // }, { offset: '57%'});
    // $('#products h1').css('opacity', 0);
    // $("#products h1").waypoint(function() {
    //     $('#products h1').addClass('animated flipInY').css('opacity', 1);
    // }, { offset: '57%'});
    // $('#calculate h1').css('opacity', 0);
    // $("#calculate h1").waypoint(function() {
    //     $('#calculate h1').addClass('animated flipInY').css('opacity', 1);
    // }, { offset: '57%'});
    // $('#calculate .calculate-image').css('opacity', 0);
    // $("#calculate .calculate-image").waypoint(function() {
    //     $('#calculate .calculate-image').addClass('animated fadeInLeft').css('opacity', 1);
    // }, { offset: '60%'});
    // $('#calculate .calculate-desc').css('opacity', 0);
    // $("#calculate .calculate-desc").waypoint(function() {
    //     $('#calculate .calculate-desc').addClass('animated fadeInRight').css('opacity', 1);
    // }, { offset: '60%'});
    //
    // $('#step-block-1').css('opacity', 0);
    // $("#step-block-1").waypoint(function() {
    //     $('#step-block-1').addClass('animated fadeInLeft');
    // }, { offset: '57%'});
    // $('#step-block-2').css('opacity', 0);
    // $("#step-block-2").waypoint(function() {
    //     $('#step-block-2').addClass('animated fadeInRight');
    // }, { offset: '57%'});
    // $('#step-block-3').css('opacity', 0);
    // $("#step-block-3").waypoint(function() {
    //     $('#step-block-3').addClass('animated fadeInLeft');
    // }, { offset: '57%'});
    // $('#step-block-4').css('opacity', 0);
    // $("#step-block-4").waypoint(function() {
    //     $('#step-block-4').addClass('animated fadeInRight');
    // }, { offset: '57%'});
});

window.onload = function() {
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
};
