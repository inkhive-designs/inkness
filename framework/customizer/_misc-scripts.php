<?php
function inkness_customize_register_misc_scripts($wp_customize){
    $wp_customize->add_section(
        'inkness_sec_pro',
        array(
            'title'     => __('Important Links','inkness'),
            'priority'  => 10,
        )
    );

    $wp_customize->add_setting(
        'inkness_pro',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new Inkness_WP_Customize_Upgrade_Control(
            $wp_customize,
            'inkness_pro',
            array(
                'description'	=> '<a class="inkness-important-links" href="https://inkhive.com/contact-us/" target="_blank">'.__('InkHive Support Forum', 'inkness').'</a>
                                    <a class="inkness-important-links" href="https://inkhive.com/documentation/inkness" target="_blank">'.__('Inkness Documentation', 'inkness').'</a>
                                    <a class="inkness-important-links" href="https://demo.inkhive.com/inkness-plus/" target="_blank">'.__('Inkness Plus Live Demo', 'inkness').'</a>
                                    <a class="inkness-important-links" href="https://www.facebook.com/inkhivethemes/" target="_blank">'.__('We Love Our Facebook Fans', 'inkness').'</a>
                                    <a class="inkness-important-links" href="https://wordpress.org/support/theme/inkness/reviews" target="_blank">'.__('Review Inkness on WordPress', 'inkness').'</a>',
                'section' => 'inkness_sec_pro',
                'settings' => 'inkness_pro',
            )
        )
    );
}
add_action('customize_register', 'inkness_customize_register_misc_scripts');