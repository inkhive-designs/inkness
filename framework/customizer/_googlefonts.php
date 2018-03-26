<?php
function inkness_customize_register_googlefonts($wp_customize){
    $wp_customize->add_section(
        'inkness_typo_options',
        array(
            'title'     => __('Google Web Fonts','inkness'),
            'priority'  => 41,
            'panel'     => 'inkness_design_panel'
        )
    );

    $font_array = array('HIND','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','Arimo','Bitter','Noto Sans');
    $fonts = array_combine($font_array, $font_array);

    $wp_customize->add_setting(
        'inkness_title_font',
        array(
            'default'=> 'Open Sans',
            'sanitize_callback' => 'inkness_sanitize_gfont'
        )
    );

    function inkness_sanitize_gfont( $input ) {
        if ( in_array($input, array('HIND','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','Arimo','Bitter','Noto Sans') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'inkness_title_font',array(
            'label' => __('Title','inkness'),
            'settings' => 'inkness_title_font',
            'section'  => 'inkness_typo_options',
            'type' => 'select',
            'choices' => $fonts,
        )
    );

    $wp_customize->add_setting(
        'inkness_body_font',
        array(	'default'=> 'Khula',
            'sanitize_callback' => 'inkness_sanitize_gfont' )
    );

    $wp_customize->add_control(
        'inkness_body_font',array(
            'label' => __('Body','inkness'),
            'settings' => 'inkness_body_font',
            'section'  => 'inkness_typo_options',
            'type' => 'select',
            'choices' => $fonts
        )
    );
}
add_action('customize_register', 'inkness_customize_register_googlefonts');