<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers

 * @package Inkness
 */

function inkness_custom_header_setup() {
	add_theme_support( 'custom-header', array(
		'default-image'          => '',
		'default-text-color'     => 'ffffff',
		'width'                  => 1920,
		'height'                 => 1080,
		'flex-height'            => true,
		'wp-head-callback'       => 'inkness_header_style',
		'admin-head-callback'    => 'inkness_admin_header_style',
		'admin-preview-callback' => 'inkness_admin_header_image',
	) );
}
add_action( 'after_setup_theme', 'inkness_custom_header_setup' );


