<?php
function inkness_customize_register_header($wp_customize) {
    $wp_customize->get_section('title_tagline')->panel = 'inkness_header_panel';
    $wp_customize->remove_control('blogdescription');
    $wp_customize->add_panel('inkness_header_panel', array(
        'title' => __('Header Settings', 'inkness'),
        'priority'  => 20
    ));
}
add_action('customize_register', 'inkness_customize_register_header');