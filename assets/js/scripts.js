// site scripts
jQuery(document).foundation();

jQuery(document).ready(function($) {

/* ---------------------------------------- */
// DEVICE HEIGHT CALC
/* ---------------------------------------- */

if (window.innerWidth < 1024) {
	// 100 vh for devices
	vh = window.innerHeight * 0.01;
	var vh_val = vh + 'px';
	document.documentElement.style.setProperty('--vh', vh_val);
}

/* ---------------------------------------- */
// DEVELOPMENT GRID ON/OFF
/* ---------------------------------------- */
$(document).on('click', 'button#grid-toggle', function() {	
	$('#grid').toggleClass('active');
    $('#grid-toggle').toggleClass('active');
});

/* ---------------------------------------- */
// TOGGLE DEVELOPMENT GRID TAB NOTIFICATIONS
/* ---------------------------------------- */
$(window).on('load',function(){
	$('html').removeClass('tabs-visible');
		window.onresize = function() {
		$('html').addClass('tabs-visible');
		setTimeout(function(){
			$('html').removeClass('tabs-visible');
		},4000);
	}
});

/* ---------------------------------------- */
// DATA SCROLLING
/* ---------------------------------------- */
$.data_scroll = function () {

    $('a[data-scroll]').click(function(e) {
        e.preventDefault();
        // set Offset Distance from top to account for fixed nav
      	var offset = 10;
        var target = ( '#' + $(this).data('scroll') );
        var $target = $(target);
        // animate the scroll to, include easing lib if you want more fancypants easings
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top - offset
        }, 800, 'swing');
    }); 

} // end
$.data_scroll();

/* ---------------------------------------- */
// SCOLLTOP 
/* ---------------------------------------- */
$(window).on('beforeunload', function() {
	setTimeout(function(){
  		$('body').hide();
  		$(window).scrollTop(0);
  	},200);
});

/* ---------------------------------------- */
// ENABLE AND DISABLE SCROLL
/* ---------------------------------------- */
$.disableScroll = function () {
    window.oldScrollPos = $(window).scrollTop();
    $(window).on('scroll.scrolldisabler',function ( event ) {
       $(window).scrollTop( window.oldScrollPos );
       event.preventDefault();
    });
}
$.enableScroll = function () {
	$(window).off('scroll.scrolldisabler');
}

/* ---------------------------------------- */
// OPEN MENU FOR MOBILE
/* ---------------------------------------- */
$.open_menu = function () {
    $('html').addClass('menu-open');
}

$.close_menu = function () {
    $('html').removeClass('menu-open');
}
// run the open close function on click
$(document).on('click', '.nav-burger ', function (e) {
    e.preventDefault();
    if ($('html').hasClass('menu-open')) {
        // close it
        $.close_menu();
        $.enableScroll();
    } else {
        // open it
        $.open_menu();
        $.disableScroll();
    }
});
// end

/* ---------------------------------------- */
// PROJECTS SLIDER FOR HOME PAGE
/* ---------------------------------------- */
$.project_slider_home = function() {
	var swiper = new Swiper('.swiper-container-project-home', {
		loop: false,
        spaceBetween: 25,
        breakpoints: {
          320: {
            slidesPerView: 1,
          },
          640: {
            slidesPerView: 1.2,
          },
          1200: {
            slidesPerView: 1.2,
          },
        },
	});
} // end
$.project_slider_home();

/* ---------------------------------------- */
// PROJECTS INDIVIDUAL FOR HOME
/* ---------------------------------------- */
$.project_slider_home_individual = function() {
	var swiper = new Swiper('.swiper-container-project-home-individual', {
		loop: false,
        spaceBetween: 25,
        breakpoints: {
          320: {
            slidesPerView: 1.2,
          },
          1200: {
            slidesPerView: 3,
          },
        },
	});
} // end
$.project_slider_home_individual();

/* ---------------------------------------- */
// PROJECTS SLIDER
/* ---------------------------------------- */
$.project_slider = function() {
	var swiper = new Swiper('.swiper-container-project', {
		loop: false,
        slidesPerView: "auto",
        spaceBetween: 25,
	});
} // end
$.project_slider();

/* ---------------------------------------- */
// GLOBAL GSAP CONFIG
/* ---------------------------------------- */
gsap.config({
  force3D: true,
});
// -- global scrolltrigger animations
	global_animations = function(){
		
		ScrollTrigger.matchMedia({
				
		"all": function() { // Animations that are the same for all breakpoints should go in here

		}, // end all function
	});

	ScrollTrigger.matchMedia({

		"(max-width: 1025px)": function() { // Mobile animations
			
		}, // end 1025px
	});


	ScrollTrigger.matchMedia({

		"(min-width: 1026px)": function() { // Desktop animations

		}, // end 1026px

	});

} // end 'global_animations'

global_animations();

}); // end doc ready

