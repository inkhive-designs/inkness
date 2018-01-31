<?php
function inkness_customize_register_layouts($wp_customize) {
    $wp_customize->get_section('background_image')->panel = 'inkness_design_panel';
    $wp_customize->get_section('colors')->panel = 'inkness_design_panel';
    $wp_customize->add_panel('inkness_design_panel', array(
        'title' => __('Design & Layouts', 'inkness'),
        'priority'  => 30,
    ));

    $wp_customize->add_section(
        'inkness_design_options',
        array(
            'title'     => __('Blog Layout','inkness'),
            'priority'  => 0,
            'panel'     => 'inkness_design_panel'
        )
    );


    $wp_customize->add_setting(
        'inkness_blog_layout',
        array( 'sanitize_callback' => 'inkness_sanitize_blog_layout' )
    );

    function inkness_sanitize_blog_layout( $input ) {
        if ( in_array($input, array('grid','grid_2_column','inkness') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'inkness_blog_layout',array(
            'label' => __('Select Layout','inkness'),
            'settings' => 'inkness_blog_layout',
            'section'  => 'inkness_design_options',
            'type' => 'select',
            'choices' => array(
                'inkness' => __('Inkness Theme Layout','inkness'),
                'grid' => __('Basic Blog Layout','inkness'),
                'grid_2_column' => __('Grid - 2 Column','inkness'),
            )
        )
    );

    $wp_customize->add_section('inkness_sidebar_options', array(
        'title'     => __('Sidebar Layout', 'inkness'),
        'priority'  => 0,
        'panel'     => 'inkness_design_panel'
    ));

    $wp_customize->add_setting(
        'inkness_disable_sidebar',
        array( 'sanitize_callback' => 'inkness_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'inkness_disable_sidebar', array(
            'settings' => 'inkness_disable_sidebar',
            'label'    => __( 'Disable Sidebar Everywhere.','inkness' ),
            'section'  => 'inkness_sidebar_options',
            'type'     => 'checkbox',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'inkness_disable_sidebar_home',
        array( 'sanitize_callback' => 'inkness_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'inkness_disable_sidebar_home', array(
            'settings' => 'inkness_disable_sidebar_home',
            'label'    => __( 'Disable Sidebar on Home/Blog.','inkness' ),
            'section'  => 'inkness_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'inkness_show_sidebar_options',
            'default'  => false
        )
    );

    $wp_customize->add_setting(
        'inkness_disable_sidebar_front',
        array( 'sanitize_callback' => 'inkness_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'inkness_disable_sidebar_front', array(
            'settings' => 'inkness_disable_sidebar_front',
            'label'    => __( 'Disable Sidebar on Front Page.','inkness' ),
            'section'  => 'inkness_sidebar_options',
            'type'     => 'checkbox',
            'active_callback' => 'inkness_show_sidebar_options',
            'default'  => false
        )
    );


    $wp_customize->add_setting(
        'inkness_sidebar_width',
        array(
            'default' => 4,
            'sanitize_callback' => 'inkness_sanitize_positive_number' )
    );

    $wp_customize->add_control(
        'inkness_sidebar_width', array(
            'settings' => 'inkness_sidebar_width',
            'label'    => __( 'Sidebar Width','inkness' ),
            'description' => __('Min: 25%, Default: 33%, Max: 40%','inkness'),
            'section'  => 'inkness_sidebar_options',
            'type'     => 'range',
            'active_callback' => 'inkness_show_sidebar_options',
            'input_attrs' => array(
                'min'   => 3,
                'max'   => 5,
                'step'  => 1,
                'class' => 'sidebar-width-range',
                'style' => 'color: #0a0',
            ),
        )
    );

    /* Active Callback Function */
    function inkness_show_sidebar_options($control) {

        $option = $control->manager->get_setting('inkness_disable_sidebar');
        return $option->value() == false ;

    }


    //Custom Footer
    $wp_customize-> add_section(
        'inkness_custom_footer',
        array(
            'title'			=> __('Custom Footer Text','inkness'),
            'description'	=> __('Enter your Own Copyright Text.','inkness'),
            'priority'		=> 11,
            'panel'			=> 'inkness_design_panel'
        )
    );

    $wp_customize->add_setting(
        'inkness_footer_text',
        array(
            'default'		=> '',
            'sanitize_callback'	=> 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'inkness_footer_text',
        array(
            'section' => 'inkness_custom_footer',
            'settings' => 'inkness_footer_text',
            'type' => 'text'
        )
    );
}
add_action('customize_register', 'inkness_customize_register_layouts');