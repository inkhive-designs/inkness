<?php
/**
 * Enqueue the stylesheet.
 */
function inkness_customizer_stylesheet() {

    wp_enqueue_style('font-awesome-2', get_template_directory_uri()."/assets/font-awesome/css/font-awesome.min.css" );
    wp_enqueue_style( 'inkness-customizer-css', get_template_directory_uri() . '/assets/css/admin.css' );
}
add_action( 'customize_controls_print_styles', 'inkness_customizer_stylesheet' );