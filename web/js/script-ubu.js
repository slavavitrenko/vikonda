(function($) {
window.onload = function() {
		
	var widthWindow = $(window).outerWidth();
	var heightWindow = $(window).outerHeight();
	var startAnimationTop = (heightWindow/3)*2;
	var yScroll = 0;
	
	
//--------------------------function to open invisible bottom content----------------------------------
	function openBottomInfo(p_clickElement, p_wrapper) {
		$(p_clickElement).on('click', function(){
			$(this).closest(p_wrapper).toggleClass('visible_bottom');
			return false;
		});		
	}



//-------------------------------------- Slider Logo Clients - owlCarousel --------------------------------------------------------------------
	
		$('.slider-horizont .slider-wrapper').owlCarousel({
			items:5,
			navigation: true,
			loop:true,
			margin:10,			
			smartSpeed:1000,
			autoplay:true,
			autoplaySpeed:1500,
			autoplayTimeout:1000,
			autoplayHoverPause:true,
			stopOnHover: true
		});
	
	
}
})(jQuery);