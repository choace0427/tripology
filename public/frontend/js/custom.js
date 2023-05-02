(function ($) {

	"use strict";

	$('.slide-carousel').on('translate.owl.carousel', function () {
		$('.text-animated h1').removeClass('fadeInDown animated').hide();
		$('.text-animated p').removeClass('fadeInUp animated').hide();
		$('.text-animated li').removeClass('fadeInUp animated').hide();
	});

	$('.slide-carousel').on('translated.owl.carousel', function () {
		$('.text-animated h1').addClass('fadeInDown animated').show();
		$('.text-animated p').addClass('fadeInUp animated').show();
		$('.text-animated li').addClass('fadeInUp animated').show();
	});

	
	// Initiate the wowjs
  	new WOW().init();

	// Superfish Menu
	$(".sf-menu").superfish({
		pathLevels: 1,
		delay: 0,
		animation: {opacity: 'show'},
		animationOut: {opacity: 'hide'},
		speed: 'fast',
		speedOut: 'fast',
		cssArrows: true,
		disableHI: false,
	});

    // Magnific Popup
    $('.magnific').magnificPopup({
      type: 'image',
      gallery:{
	    enabled:true
	  }
    });

	 // Scroll-Top
	$(".scroll-top").hide();
	$(window).on("scroll", function () {
		if ($(this).scrollTop() > 300) {
			$(".scroll-top").fadeIn();
		} else {
			$(".scroll-top").fadeOut();
		}
	});
	$(".scroll-top").on("click", function () {
		$("html, body").animate({
			scrollTop: 0,
		}, 600)
	});


	$(window).on('load',function () {
		$('#preloader').fadeOut();
		$('#preloader-status').delay(200).fadeOut('slow');
		$('body').delay(200).css({
			'overflow-x': 'hidden'
		});
	});


	$('#example').DataTable();

	// Slicknav
	$('#menu').slicknav();

	
})(jQuery);
