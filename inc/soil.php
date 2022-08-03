<?php
if (! defined('WP_DEBUG')) {
	die( 'Direct access forbidden.' );
}

add_theme_support('soil', [
    'clean-up' => [
        'disable_gutenberg_block_css' => false,
    ],
    'disable-asset-versioning',
    'disable-trackbacks',
    'nice-search',
    'relative-urls',
]);