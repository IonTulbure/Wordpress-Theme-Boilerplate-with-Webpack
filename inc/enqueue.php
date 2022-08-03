<?php
if (! defined('WP_DEBUG')) {
	die( 'Direct access forbidden.' );
}


//Backend styles
add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
function load_admin_styles() {
    wp_enqueue_style( 'admin_css_bar', get_stylesheet_directory_uri() . '/assets/public/css/backend.css', false, '1.0.0' );
//    wp_enqueue_style( 'admin_css_bar', get_template_directory_uri() . '/admin-style-bar.css', false, '1.0.0' );
}

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style('blocksy-child-style', get_stylesheet_uri());
	// Add vendor script under this

	// Do not change these items
	wp_enqueue_style('frontend-style', get_stylesheet_directory_uri() . '/assets/public/css/frontend.css');
	wp_enqueue_script('frontend-script', get_stylesheet_directory_uri() . '/assets/public/js/frontend.js', array(), '', true);
});