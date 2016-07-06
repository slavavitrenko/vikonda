;$(document).ready(function() {
    /*=======---slick slider---=======*/


    /*=======---animate---=======*/


});
    
window.onload = function() {
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
};
