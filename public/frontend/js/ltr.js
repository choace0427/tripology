(function ($) {

	"use strict";

	// Slider
	$('.slide-carousel').owlCarousel({
		loop: true,
		autoplay: true,
		autoplayHoverPause: true,
		autoplaySpeed: 1500,
		smartSpeed: 1500,
		animateIn: 'fadeIn',
		animateOut: 'fadeOut',
		margin: 0,
		dots: true,
		nav: true,
		navText: ["<i class='fas fa-caret-left'></i>", "<i class='fas fa-caret-right'></i>"],
		responsive: {
			0: {
				items: 1,
				nav: false
			},
			576: {
				items: 1
			},
			1000: {
				items: 1
			}
		}
	});


	// Featured
	$('.featured-carousel').owlCarousel({
		loop: false,
		autoplay: true,
		margin: 30,
		nav: false,
		navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
		responsive: {
			0: {
				items: 1
			},
			520: {
				items: 1
			},
			768: {
				items: 3
			},
			1000: {
				items: 3
			}
		}
	});

	// Team
	$('.team-carousel').owlCarousel({
		loop: true,
		autoplay: true,
		autoplayHoverPause: true,
		margin: 30,
		dots: true,
		nav: false,
		navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
		responsive: {
			0: {
				items: 1,
				dots: false,
				nav: true
			},
			460: {
				items: 2,
				dots: false,
				nav: true
			},
			768: {
				items: 3
			},
			992: {
				items: 4
			},
			1200: {
				items: 4
			}
		}
	});

	// Testimonia
	$('.testimonial-gallery').owlCarousel({
		loop: false,
		autoplay: true,
		margin: 30,
		nav: false,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 1
			},
			1000: {
				items: 1
			}
		}
	});

	// Testimonia-Page
	$('.testi-page-carousel').owlCarousel({
		loop: false,
		autoplay: true,
		margin: 30,
		nav: false,
		navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
		responsive: {
			0: {
				items: 1,
				dots: false,
				nav: true
			},
			620: {
				items: 2,
				dots: false,
				nav: true
			},
			768: {
				items: 2
			},
			1000: {
				items: 2
			}
		}
	});

	// Blog
	$('.blog-carousel').owlCarousel({
		loop: true,
		autoplay: true,
		autoplayHoverPause: true,
		autoplaySpeed: 1500,
		smartSpeed: 1500,
		margin: 30,
		nav: true,
		navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 2
			},
			768: {
				items: 2
			},
			992: {
				items: 3
			},
			1000: {
				items: 3
			}
		}
	});

	// Brand
	$('.brand-carousel').owlCarousel({
		loop: false,
		autoplay: true,
		autoplayHoverPause: true,
		autoplaySpeed: 1500,
		smartSpeed: 1500,
		margin: 30,
		nav: false,
		navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
		responsive: {
			0: {
				items: 2
			},
			575: {
				items: 4
			},
			991: {
				items: 5
			},
			1200: {
				items: 6
			}
		}
	});

	// Featured Detail
	$('.single-feat-carousel').owlCarousel({
		loop: true,
		margin: 30,
		nav: true,
		navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
		responsive: {
			0: {
				items: 1
			},
			600: {
				items: 1
			},
			1000: {
				items: 1
			}
		}
	});

})(jQuery);