<?php
if (! defined('WP_DEBUG')) {
	die( 'Direct access forbidden.' );
}

// Do not add every single function in this file. But use the files below
// Or add a new file and include it here. So we can keep this clean.
include_once( get_stylesheet_directory() . '/inc/enqueue.php');
include_once( get_stylesheet_directory() . '/inc/filters.php');
include_once( get_stylesheet_directory() . '/inc/soil.php');
include_once( get_stylesheet_directory() . '/inc/generate-blocks.php');