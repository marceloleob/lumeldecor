// Bootstrap
require('../bootstrap');

// Bootstrap SelectPicker
require('../../../node_modules/bootstrap-select/dist/js/bootstrap-select');

// jQuery Validate
require('../../../node_modules/jquery-validation/dist/jquery.validate.min.js');

// jQuery Validate
require('../../../node_modules/owl.carousel/dist/owl.carousel.min.js');



(function($) {
	'use strict';

	/*===================================*
	01. LOADING JS
	/*===================================*/
	$(window).on('load', function() {
		setTimeout(function () {
			$(".preloader").delay(700).fadeOut(700).addClass('loaded');
		}, 800);
	});


	/*===================================*
	02. BACKGROUND IMAGE JS
	*===================================*/
	$(".background_bg").each(function() {
		var attr = $(this).attr('data-img-src');
		if (typeof attr !== typeof undefined && attr !== false) {
			$(this).css('background-image', 'url(' + attr + ')');
		}
	});

	/*===================================*
	03. BANNERS ANIMATION JS
	*===================================*/
	$(function() {

		function ckScrollInit(items, trigger) {
			items.each(function() {
				var ckElement = $(this),
					AnimationClass = ckElement.attr('data-animation'),
					AnimationDelay = ckElement.attr('data-animation-delay');

				ckElement.css({
					'-webkit-animation-delay': AnimationDelay,
					'-moz-animation-delay': AnimationDelay,
					'animation-delay': AnimationDelay,
					opacity: 0
				});

				var ckTrigger = (trigger) ? trigger : ckElement;

				ckTrigger.waypoint(function() {
					ckElement.addClass("animated").css("opacity", "1");
					ckElement.addClass('animated').addClass(AnimationClass);
				}, {
					triggerOnce: true,
					offset: '90%',
				});
			});
		}

		ckScrollInit($('.animation'));
		ckScrollInit($('.staggered-animation'), $('.staggered-animation-wrap'));
	});


	/*===================================*
	04. MENU JS
	*===================================*/
	$( document ).ready(function()
	{
		// Main navigation scroll spy for shadow
		$(window).on('scroll', function() {
			var scroll = $(window).scrollTop();

			if (scroll >= 150) {
				$('header.fixed-top').addClass('nav-fixed');

				if ($('#navCatContent').data('page') === 'home') {
					$('#navCatContent').removeClass('nav_cat');
				}

			} else {
				$('header.fixed-top').removeClass('nav-fixed');

				if ($('#navCatContent').data('page') === 'home') {
					$('#navCatContent').addClass('nav_cat');
				}
			}
		});
	});

	// Show Hide dropdown-menu Main navigation
	$( document ).ready(function()
	{
		$( '.dropdown-menu a.dropdown-toggler' ).on( 'click', function () {
			//var $el = $( this );
			//var $parent = $( this ).offsetParent( ".dropdown-menu" );
			if ( !$( this ).next().hasClass( 'show' ) ) {
				$( this ).parents( '.dropdown-menu' ).first().find( '.show' ).removeClass( "show" );
			}
			var $subMenu = $( this ).next( ".dropdown-menu" );
			$subMenu.toggleClass( 'show' );

			$( this ).parent( "li" ).toggleClass( 'show' );

			$( this ).parents( 'li.nav-item.dropdown.show' ).on( 'hidden.bs.dropdown', function () {
				$( '.dropdown-menu .show' ).removeClass( "show" );
			} );

			return false;
		});
	});

	// Hide Navbar Dropdown After Click On Links
	var navBar = $(".header_wrap");
	var navbarLinks = navBar.find(".navbar-collapse ul li a.page-scroll");

    $.each( navbarLinks, function() {

      var navbarLink = $(this);

        navbarLink.on('click', function () {
			navBar.find(".navbar-collapse").collapse('hide');
			$("header").removeClass("active");
        });
    });

	// Main navigation Active Class Add Remove
	$('.navbar-toggler').on('click', function() {
		$("header").toggleClass("active");
		if($('.search-overlay').hasClass('open'))
		{
			$(".search-overlay").removeClass('open');
			$(".search_trigger").removeClass('open');
		}
	});

	$( document ).ready(function()
	{
		if ($('.header_wrap').hasClass("fixed-top") && !$('.header_wrap').hasClass("transparent_header") && !$('.header_wrap').hasClass("no-sticky")) {
			$(".header_wrap").before('<div class="header_sticky_bar d-none"></div>');
		}
	});

	$(window).on('scroll', function() {
		var scroll = $(window).scrollTop();

	    if (scroll >= 150) {
	        $('.header_sticky_bar').removeClass('d-none');
			$('header.no-sticky').removeClass('nav-fixed');

	    } else {
	        $('.header_sticky_bar').addClass('d-none');
	    }
	});

	var setHeight = function() {
		var height_header = $(".header_wrap").height();
		$('.header_sticky_bar').css({'height':height_header});
	};

	$(window).on('load', function() {
	  setHeight();
	});

	$(window).on('resize', function() {
	  setHeight();
	});

	$('.sidetoggle').on('click', function () {
		$(this).addClass('open');
		$('body').addClass('sidetoggle_active');
		$('.sidebar_menu').addClass('active');
		$("body").append('<div id="header-overlay" class="header-overlay"></div>');
	});

	$(document).on('click', '#header-overlay, .sidemenu_close',function() {
		$('.sidetoggle').removeClass('open');
		$('body').removeClass('sidetoggle_active');
		$('.sidebar_menu').removeClass('active');
		$('#header-overlay').fadeOut('3000',function(){
			$('#header-overlay').remove();
		});
		 return false;
	});

	$(".categories_btn").on('click', function() {
		$('.side_navbar_toggler').attr('aria-expanded', 'false');
		$('#navbarSidetoggle').removeClass('show');
	});

	$(".side_navbar_toggler").on('click', function() {
		$('.categories_btn').attr('aria-expanded', 'false');
		$('#navCatContent').removeClass('show');
	});

	$(".pr_search_trigger").on('click', function() {
		$(this).toggleClass('show');
		$('.product_search_form').toggleClass('show');
	});

	var rclass = true;

	$("html").on('click', function () {
		if (rclass) {
			$('.categories_btn').addClass('collapsed');
			$('.categories_btn,.side_navbar_toggler').attr('aria-expanded', 'false');
			$('#navCatContent,#navbarSidetoggle').removeClass('show');
		}
		rclass = true;
	});

	$(".categories_btn,#navCatContent,#navbarSidetoggle .navbar-nav,.side_navbar_toggler").on('click', function() {
		rclass = false;
	});


	/*===================================*
	05. SMOOTH SCROLLING JS
	*===================================*/
	document.addEventListener("touchstart", function(e) {
		console.log(e.defaultPrevented);  // will be false
		e.preventDefault();   // does nothing since the listener is passive
		console.log(e.defaultPrevented);  // still false
	}, Modernizr.passiveeventlisteners ? {passive: true} : false);

	$( document ).ready(function()
	{
		// Select all links with hashes
		var topheaderHeight = $(".top-header").innerHeight();
		var mainheaderHeight = $(".header_wrap").innerHeight();
		var headerHeight = mainheaderHeight - topheaderHeight - 20;

		$('a.page-scroll[href*="#"]:not([href="#"])').on('click', function() {

			$('a.page-scroll.active').removeClass('active');
			$(this).closest('.page-scroll').addClass('active');

			// On-page links
			if ( location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname ) {
				// Figure out element to scroll to
				var target = $(this.hash),
					speed= $(this).data("speed") || 800;
					target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

				// Does a scroll target exist?
				if (target.length) {
					// Only prevent default if animation is actually gonna happen
					event.preventDefault();
					$('html, body').animate({
						scrollTop: target.offset().top - headerHeight
					}, speed);
				}
			}
		});
	});

	$(window).on('scroll', function()
	{
		var lastId = null,
			// All list items
			menuItems = $(".header_wrap").find("a.page-scroll"),
			topMenuHeight = $(".header_wrap").innerHeight() + 20,
			// Anchors corresponding to menu items
			scrollItems = menuItems.map(function(){
				var items = $($(this).attr("href"));
				if (items.length) { return items; }
			});
		var fromTop = $(this).scrollTop()+topMenuHeight;
		// Get id of current scroll item
		var cur = scrollItems.map(function() {
			if ($(this).offset().top < fromTop)
			return this;
		});
		// Get the id of the current element
		cur = cur[cur.length-1];
		var id = cur && cur.length ? cur[0].id : "";

		if (lastId !== id) {
			lastId = id;
			// Set/remove active class
			menuItems.closest('.page-scroll').removeClass("active").end().filter("[href='#"+id+"']").closest('.page-scroll').addClass("active");
		}
	});

	$('.more_slide_open').slideUp();
	$('.more_categories').on('click', function () {
		$(this).toggleClass('show');
		$('.more_slide_open').slideToggle();
	});


	/*===================================*
	06. SEARCH JS
	*===================================*/
	$(".close-search").on("click", function() {
		$(".search_wrap,.search_overlay").removeClass('open');
		$("body").removeClass('search_open');
	});

	var removeClass = true;
	$(".search_wrap").after('<div class="search_overlay"></div>');
	$(".search_trigger").on('click', function () {
		$(".search_wrap,.search_overlay").toggleClass('open');
		$("body").toggleClass('search_open');
		removeClass = false;
		if($('.navbar-collapse').hasClass('show'))
		{
			$(".navbar-collapse").removeClass('show');
			$(".navbar-toggler").addClass('collapsed');
			$(".navbar-toggler").attr("aria-expanded", false);
		}
	});
	$(".search_wrap form").on('click', function() {
		removeClass = false;
	});
	$("html").on('click', function () {
		if (removeClass) {
			$("body").removeClass('open');
			$(".search_wrap,.search_overlay").removeClass('open');
			$("body").removeClass('search_open');
		}
		removeClass = true;
	});


	/*===================================*
	07. SCROLLUP JS
	*===================================*/
	$(window).on('scroll', function() {
		if ($(this).scrollTop() > 150) {
			$('.scrollup').fadeIn();
		} else {
			$('.scrollup').fadeOut();
		}
	});

	$(".scrollup").on('click', function (e) {
		e.preventDefault();
		$('html, body').animate({
			scrollTop: 0
		}, 600);
		return false;
	});


	/*===================================*
	10. COUNTER JS
	*===================================*/
	var timer = $('.counter');
	if (timer.length) {
		timer.appear(function () {
			timer.countTo();
		});
	}


	/*===================================*
	12. SLIDER JS
	*===================================*/
	function carousel_slider() {
		$('.carousel_slider').each( function()
		{
			var $carousel = $(this);
			$carousel.owlCarousel({
				dots : $carousel.data("dots"),
				loop : $carousel.data("loop"),
				items: $carousel.data("items"),
				margin: $carousel.data("margin"),
				mouseDrag: $carousel.data("mouse-drag"),
				// touchDrag: $carousel.data("touch-drag"),
				autoHeight: $carousel.data("autoheight"),
				center: $carousel.data("center"),
				nav: $carousel.data("nav"),
				rewind: $carousel.data("rewind"),
				navText: ['<i class="ion-ios-arrow-left"></i>', '<i class="ion-ios-arrow-right"></i>'],
				autoplay : $carousel.data("autoplay"),
				animateIn : $carousel.data("animate-in"),
				animateOut: $carousel.data("animate-out"),
				autoplayTimeout : $carousel.data("autoplay-timeout"),
				smartSpeed: $carousel.data("smart-speed"),
				// responsive: $carousel.data("responsive")
				responsive: {
					0: {
						items: 1
					},
					481: {
						items: 2
					},
					768: {
						items: 3
					},
					1199: {
						items: 4
					}
				}

			});
		});
	}

	function slick_slider() {
		$('.slick_slider').each( function()
		{
			var $slick_carousel = $(this);
			$slick_carousel.slick({
				arrows: $slick_carousel.data("arrows"),
				dots: $slick_carousel.data("dots"),
				infinite: $slick_carousel.data("infinite"),
				centerMode: $slick_carousel.data("center-mode"),
				vertical: $slick_carousel.data("vertical"),
				fade: $slick_carousel.data("fade"),
				cssEase: $slick_carousel.data("css-ease"),
				autoplay: $slick_carousel.data("autoplay"),
				verticalSwiping: $slick_carousel.data("vertical-swiping"),
				autoplaySpeed: $slick_carousel.data("autoplay-speed"),
				speed: $slick_carousel.data("speed"),
				pauseOnHover: $slick_carousel.data("pause-on-hover"),
				draggable: $slick_carousel.data("draggable"),
				slidesToShow: $slick_carousel.data("slides-to-show"),
				slidesToScroll: $slick_carousel.data("slides-to-scroll"),
				asNavFor: $slick_carousel.data("as-nav-for"),
				focusOnSelect: $slick_carousel.data("focus-on-select"),
				responsive: $slick_carousel.data("responsive")
			});
		});
	}

	$( document ).ready(function() {
		carousel_slider();
		slick_slider();
	});


	/*===================================*
	14. POPUP JS
	*===================================*/
	$('.content-popup').magnificPopup({
		type: 'inline',
		preloader: true,
		mainClass: 'mfp-zoom-in',
	});

	$('.image_gallery').each(function() { // the containers for all your galleries
		$(this).magnificPopup({
			delegate: 'a', // the selector for gallery item
			type: 'image',
			gallery: {
			  enabled: true,
			},
		});
	});

	$('.popup-ajax').magnificPopup({
		type: 'ajax',
		callbacks: {
			ajaxContentAdded: function() {
				carousel_slider();
				slick_slider();
			 }
		}
	});

	$('.video_popup, .iframe_popup').magnificPopup({
		type: 'iframe',
		removalDelay: 160,
		mainClass: 'mfp-zoom-in',
		preloader: false,
		fixedContentPos: false
	});


	/*==============================================================
	17. DROPDOWN JS
	==============================================================*/
	if ($(".custome_select").length > 0) {

		$( document ).ready(function()
		{
			$(".custome_select").msDropdown();
		});
	}


	/*===================================*
	18. PROGRESS BAR JS
	*===================================*/
	$('.progress-bar').each(function()
	{
		var width = $(this).attr('aria-valuenow');
		$(this).appear(function() {
			$(this).css('width', width + '%');
			$(this).children('.count_pr').css('left', width + '%');
			$(this).find('.count').countTo({
				from: 0,
				to: width,
				time: 3000,
				refreshInterval: 50,
			});
		});
	});


	/*===================================*
	20. COUNTDOWN JS
	*===================================*/
	$('.countdown_time').each(function() {
		var endTime = $(this).data('time');
		$(this).countdown(endTime, function(tm) {
			$(this).html(tm.strftime('<div class="countdown_box"><div class="countdown-wrap"><span class="countdown days">%D </span><span class="cd_text">Days</span></div></div><div class="countdown_box"><div class="countdown-wrap"><span class="countdown hours">%H</span><span class="cd_text">Hours</span></div></div><div class="countdown_box"><div class="countdown-wrap"><span class="countdown minutes">%M</span><span class="cd_text">Minutes</span></div></div><div class="countdown_box"><div class="countdown-wrap"><span class="countdown seconds">%S</span><span class="cd_text">Seconds</span></div></div>'));
		});
	});


	/*===================================*
	21. List Grid JS
	*===================================*/
	$('.shorting_icon').on('click',function() {
		if ($(this).hasClass('grid')) {
			$('.shop_container').removeClass('list').addClass('grid');
			$(this).addClass('active').siblings().removeClass('active');
		}
		else if($(this).hasClass('list')) {
			$('.shop_container').removeClass('grid').addClass('list');
			$(this).addClass('active').siblings().removeClass('active');
		}
		$(".shop_container").append('<div class="loading_pr"><div class="mfp-preloader"></div></div>');
		setTimeout(function(){
		  $('.loading_pr').remove();
		}, 800);
	});


	/*===================================*
	22. TOOLTIP JS
	*===================================*/
	$(function () {
		$('[data-toggle="tooltip"]').tooltip({
			trigger: 'hover',
		});
	});
	$(function () {
		$('[data-toggle="popover"]').popover();
	});


	/*===================================*
	23. PRODUCT COLOR JS
	*===================================*/
	$('.product_color span').each(function() {
		var get_color = $(this).attr('data-color');
		$(this).css("background-color", get_color);
	});

	$('.product_color_switch span').each(function() {
		var get_color = $(this).attr('data-color');
		$(this).css("background-color", get_color);
	});

	$('.product_color span,.product_color_switch span,.product_size_switch span').on("click", function() {
		$(this).siblings(this).removeClass('active').end().addClass('active');
	});


	/*===================================*
	24. QUICKVIEW POPUP + ZOOM IMAGE + PRODUCT SLIDER JS
	*===================================*/
	var image = $('#product_img');
	//var zoomConfig = {};
	var zoomActive = false;

	zoomActive = !zoomActive;
	if (zoomActive) {
		if ($(image).length > 0 ) {
			$(image).elevateZoom({
				cursor: "crosshair",
				easing : true,
				gallery:'pr_item_gallery',
				zoomType: "inner",
				galleryActiveClass: "active"
			});
		}
	}
	else {
		//remove zoom instance from image
		$.removeData(image, 'elevateZoom');
		// remove zoom container from DOM
		$('.zoomContainer:last-child').remove();
	}

	$.magnificPopup.defaults.callbacks = {
	open: function() {
		$('body').addClass('zoom_image');
	},
	close: function() {
		// Wait until overflow:hidden has been removed from the html tag
		setTimeout(function() {
			$('body').removeClass('zoom_image');
			$('body').removeClass('zoom_gallery_image');
			$('.zoomContainer').slice(1).remove();
			}, 100);
		}
  	};

	// Set up gallery on click
	var galleryZoom = $('#pr_item_gallery');
	galleryZoom.magnificPopup({
		delegate: 'a',
		type: 'image',
		gallery:{
			enabled: true
		},
		callbacks: {
			elementParse: function(item) {
				item.src = item.el.attr('data-zoom-image');
			}
		}
	});

	// Zoom image when click on icon
	$('.product_img_zoom').on('click', function(){
		var atual = $('#pr_item_gallery a').attr('data-zoom-image');
		$('body').addClass('zoom_gallery_image');
		$('#pr_item_gallery .item').each(function(){
			if( atual == $(this).find('.product_gallery_item').attr('data-zoom-image') ) {
				return galleryZoom.magnificPopup('open', $(this).index());
			}
		});
	});

	$('.plus').on('click', function() {
		if ($(this).prev().val()) {
			$(this).prev().val(+$(this).prev().val() + 1);
		}
	});
	$('.minus').on('click', function() {
		if ($(this).next().val() > 1) {
			if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
		}
	});

	 /*===================================*
	25. PRICE FILTER JS
	*===================================*/
	$('#price_filter').each( function() {
		var $filter_selector = $(this);
		var a = $filter_selector.data("min-value");
		var b = $filter_selector.data("max-value");
		var c = $filter_selector.data("price-sign");
		$filter_selector.slider({
			range: true,
			min: $filter_selector.data("min"),
			max: $filter_selector.data("max"),
			values: [ a, b ],
			slide: function( event, ui ) {
				$( "#flt_price" ).html( c + ui.values[ 0 ] + " - " + c + ui.values[ 1 ] );
				$( "#price_first" ).val(ui.values[ 0 ]);
				$( "#price_second" ).val(ui.values[ 1 ]);
			}
		});
		$( "#flt_price" ).html( c + $filter_selector.slider( "values", 0 ) + " - " + c + $filter_selector.slider( "values", 1 ) );
	});


	/*===================================*
	27. CHECKBOX CHECK THEN ADD CLASS JS
	*===================================*/
	$('.create-account,.different_address').hide();
	$('#createaccount:checkbox').on('change', function(){
		if($(this).is(":checked")) {
			$('.create-account').slideDown();
		} else {
			$('.create-account').slideUp();
		}
	});
	$('#differentaddress:checkbox').on('change', function(){
		if($(this).is(":checked")) {
			$('.different_address').slideDown();
		} else {
			$('.different_address').slideUp();
		}
	});


	/*===================================*
	28. Cart Page Payment option
	*===================================*/
	$( document ).ready(function() {
		$('[name="payment_option"]').on('change', function() {
			var $value = $(this).attr('value');
			$('.payment-text').slideUp();
			$('[data-method="'+$value+'"]').slideDown();
		});
	});


	/*===================================*
	29. ONLOAD POPUP JS
	*===================================*/
	$(window).on('load',function(){
		setTimeout(function() {
			$("#onload-popup").modal('show', {}, 500);
		}, 3000);

	});


	/*===================================*
	30. SHOW HIDE PASSWORD
	*===================================*/
	$(".toggle-password").on('click', function ()
	{
		$(this).toggleClass("fas fa-eye-slash fas fa-eye");
		var input = $($(this).attr("data-toggle"));
		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});

})(jQuery);
