<?php
function inkness_customize_control_misc_scripts($wp_customize) {
    $wp_customize->add_section(
        'inkness_sec_h',
        array(
            'title'     => __('Inkness Help & Support!!','inkness'),
            'priority'  => 10,
        )
    );

    $wp_customize->add_setting(
        'inkness_h',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new Inkness_WP_Customize_Upgrade_Control(
            $wp_customize,
            'inkness_h',
            array(
                'label' => __('Free Help & Support','inkness'),
                'description' => __('With <a href="http://inkhive.com/product/inkness-plus/" target="_blank">Pro Version</a> You also have the option to Remove Search Bar from header, and move to a full width menu. Upgrade at Just $45','inkness'),
                'section' => 'inkness_sec_h',
                'settings' => 'inkness_h',
            )
        )
    );

    //Upgrade to Pro
    $wp_customize->add_section(
        'inkness_sec_pro',
        array(
            'title'     => __('-> Upgrade to Inkness Plus','inkness'),
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
                'label' => __('Unlock More Features','inkness'),
                'description' => __('
	            			Inkness Plus comes with so many features that you will fall in love with the theme. We have added everything everyone requested for and so much more. Here is a small list of what Inkness Plus includes<br/><br/>
	            			<ul>
	            			<li> - Improved Mobile Friendliness</li>
	            			<li> - Custom Header Images for Posts & Pages</li>
	            			<li> - Advanced Slider</li>
	            			<li> - More Featured Areas</li>
	            			<li> - <strong>Unlimited Colors & Skins</strong></li>
	            			<li> - Improved SEO Friendliness</li>
							<li> - Custom Options for Pages</li>
							<li> - Multiple Blog Layouts</li>
							<li> - 30+ Social Icons</li>
							<li> - 650+ Google Fonts</li>
							<li> - and much more</li></ul><br/>
	            			To know more or to purchase, visit <a href="https://inkhive.com/product/inkness-plus/">Inkness Plus.</a> 
							','inkness'),
                'section' => 'inkness_sec_pro',
                'settings' => 'inkness_pro',
            )
        )
    );
}
add_action('customize_register', 'inkness_customize_control_misc_scripts');