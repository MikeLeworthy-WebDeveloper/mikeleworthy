<?php

	// Unregister the awful default WordPress scripts and styles.
	wp_deregister_script('wp-embed');
	wp_dequeue_style('wp-block-library');
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');

	// add theme support options
	add_theme_support( 'menus' );

	// add theme support post thumbnails
	add_theme_support( 'post-thumbnails' );

	// add theme support for WP Controlled Title Tag
	add_theme_support( 'title-tag' );

	// add theme support HTML5
	add_theme_support( 'html5', 
         array( 
         	'comment-list', 
         	'comment-form', 
         	'search-form', 
         ) 
	);

	// add theme support for post formats
	 add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	); 

	// register the menus
	function register_menus() {
	 	register_nav_menu('main-navigation',__( 'Main Navigation' ));
	}
	add_action( 'init', 'register_menus' );


	//remove the classes from the ul and list items
	add_filter('nav_menu_item_id', 'clear_nav_menu_item_id', 10, 3);
	function clear_nav_menu_item_id($id, $item, $args) {
			return "";
	}

	add_filter('nav_menu_css_class', 'clear_nav_menu_item_class', 10, 3);
	function clear_nav_menu_item_class($classes, $item, $args) {
			return array();
	}

	// register the menus
	function register_my_menus() {
		register_nav_menus(
			array(
			'main-navigation' => __( 'Main Navigation' ),
			'sub-navigation'  => __( 'Sub Navigation' ),
			)
		);
	}
	add_action( 'init', 'register_my_menus' );

	// acf options
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page();
	}

	// srcset img function
	function srcset_image($image_id){
		$image_src = wp_get_attachment_image_src($image_id,'full')[0];
	 	$image_srcset = wp_get_attachment_image_srcset( $image_id);
	 	$img_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
		echo wp_get_attachment_image($image_id, '5090', false, []);
	}

	/* ------------------------------------------------------------------------------*/
	// CUSTOM POST TYPE FOR PROJECTS
	/* ------------------------------------------------------------------------------*/
	function create_posttype_projects() {
	    register_post_type( 'projects',
	    // CPT Options
	        array(
	            'labels' 			=> array(
	                'name' 			=> __( 'Projects' ),
	                'singular_name' => __( 'Project' ),
	            ),
	            'public' 			=> true,
	            'has_archive' 		=> false,
	            'menu_icon'   		=> 'dashicons-text-page',
	            'supports' 			=> array( 'title', 'thumbnail', 'author' ),
	            'taxonomies' 		=> array('post_tag'),
	        )
	    );
	}
	add_action( 'init', 'create_posttype_projects' );

	// add page slug body class to pages

	function add_slug_body_class( $classes ) {
		global $post;
		if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
		}
		return $classes;
		}
	add_filter( 'body_class', 'add_slug_body_class' );

  	// move yoast to bottom of page
	function yoasttobottom()
	{
	    return 'low';
	}
	add_filter('wpseo_metabox_prio', 'yoasttobottom');

 ?>