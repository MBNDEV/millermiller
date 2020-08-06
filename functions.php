<?php

//MBN Login
include_once("mbn-login/setup.php");

//Custom Post types
require get_template_directory() . '/includes/post-types.php';

if ( ! function_exists( 'mbn_setup' ) ) :

	function mbn_setup() {

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'editor-styles' );
		add_editor_style( 'editor.css' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'mbn' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'mbn' ),
			'service-menu' => esc_html__( 'Service Menu', 'mbn' )
		) );

	}
endif;
add_action( 'after_setup_theme', 'mbn_setup' ); 


/**
 * Enqueue scripts and styles.
 */
function mbn_scripts() {
	global $wp_version;

	//Fonts
    wp_enqueue_style('font-lato', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,400;1,700&display=swap', [], $wp_version);
	wp_enqueue_style('font-manrope', 'https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap', [], $wp_version);

	//Global CSS
	//wp_enqueue_style( 'mbn-style', get_stylesheet_uri() );
	wp_enqueue_style( 'main', get_template_directory_uri()."/assets/css/main.css", [], $wp_version);
	wp_enqueue_style( 'plugins', get_template_directory_uri()."/assets/css/plugins.css", [], $wp_version);
	wp_enqueue_style( 'custom', get_template_directory_uri()."/assets/css/custom.css", [], $wp_version);
	
	wp_enqueue_style( 'inner', get_template_directory_uri()."/assets/css/inner.css", [], $wp_version);


	//Global JS
	wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() .'/assets/js/jquery-3.0.0.min.js', [], $wp_version);
    wp_enqueue_script( 'jquery' );

    wp_deregister_script( 'jquery-migrate' );
    wp_register_script( 'jquery-migrate', get_template_directory_uri() .'/assets/js/jquery-migrate-3.min.js', [], $wp_version);
    wp_enqueue_script( 'jquery-migrate' );

    //Pugins
	wp_enqueue_script( 'foundation', get_template_directory_uri() . '/assets/js/foundation.min.js', [], $wp_version, true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', [], $wp_version, true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', [], $wp_version, true );
    
}
add_action( 'wp_enqueue_scripts', 'mbn_scripts' );


// remove wp emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');


// Disable all colors within Gutenberg.
function mbn_gutenberg_disable_all_colors() {
    add_theme_support( 'editor-color-palette' );
    add_theme_support( 'disable-custom-colors' );
}
add_action( 'after_setup_theme', 'mbn_gutenberg_disable_all_colors' );

function be_enable_vcard_upload( $mime_types ){
	$mime_types['vcf'] = 'text/x-vcard';
	return $mime_types;
  }
  add_filter('upload_mimes', 'be_enable_vcard_upload' );