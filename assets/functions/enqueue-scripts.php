<?php

function jquery_cdn() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
    	wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', null, 'all',false );
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'jquery_cdn');

function site_scripts() {

  	global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

	// js //

    // foundation
  	wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/assets/js/foundation.min.js', array( 'jquery' ), null, 'all',false );

    // gsap
    wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js', array(), false, true );

    // scrolltrigger
    wp_enqueue_script( 'scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/ScrollTrigger.min.js', array(), false, true );

    // swiper 
    wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/assets/js/swiper/swiper-bundle.min.js', array( 'jquery' ), null, 'all',false );

    // site scripts
    wp_enqueue_script( 'scripts-js', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), null, 'all',false );

  	// css //

    // foundation - grid only
  	wp_enqueue_style( 'foundation-css', get_template_directory_uri() . '/assets/css/foundation.min.css', array(), null, 'all',false );

    // swiper css
    wp_enqueue_style( 'swiper-css', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', array(), null, 'all',false );

    // styles for the site
    wp_enqueue_style( 'app-css', get_template_directory_uri() . '/assets/css/app.css', array(), null, 'all',false );

    // Localize the script with new data
    
    global $wp_query;
    global $post;
    
    wp_localize_script( 'scripts-js', 'php_data', array(    
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'homeUrl' => home_url() . '/',
        'nonce'   => wp_create_nonce('gg-security'),
        'pluginsPath' =>  plugins_url() . '/',
        // 'ajaxurl' => get_template_directory_uri().'/custom-ajax-handler.php',
        'stylesheet_directory' => get_stylesheet_directory_uri(),
        'security' => wp_create_nonce('string_funcname'),
    )); 
}

add_action('wp_enqueue_scripts', 'site_scripts', 999);