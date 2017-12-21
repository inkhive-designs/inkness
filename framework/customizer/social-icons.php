<?php
	function inkness_customize_register_social( $wp_customize ) {
		// Social Icons
	$wp_customize->add_section('inkness_social_section', array(
			'title' => __('Social Icons','inkness'),
			'priority' => 44 ,
			'panel' => 'inkness_header_panel'
	));

	$social_networks = array( //Redefinied in Sanitization Function.
					'none' => __('-','inkness'),
					'facebook' => __('Facebook','inkness'),
					'twitter' => __('Twitter','inkness'),
					'google-plus' => __('Google Plus','inkness'),
					'instagram' => __('Instagram','inkness'),
					'rss' => __('RSS Feeds','inkness'),
					'vine' => __('Vine','inkness'),
					'vimeo-square' => __('Vimeo','inkness'),
					'youtube' => __('Youtube','inkness'),
					'flickr' => __('Flickr','inkness'),
					'pinterest-p'	=> __('Pinterest', 'inkness'),
				);

	$social_icon_styles = array(
	        'hvr-bounce-to-bottom' => __('Default', 'inkness'),
            'hvr-rectangle-out' => __('Style 1', 'inkness'),
        );

	$wp_customize->add_setting('inkness_social_icon_style', array(
	    'default' => 'none',
        'sanitize_callback' => 'inkness_sanitize_social_style'
    ) );

	function inkness_sanitize_social_style($input) {
	    $social_icon_styles = array(
	        'hvr-bounce-to-bottom',
            'hvr-rectangle-out',
        );
	    if ( in_array($input, $social_icon_styles))
	        return $input;
	    else
	        return '';
    }

    $wp_customize->add_control('inkness_social_icon_style', array(
         'setting' => 'inkness_social_icon_style',
         'section' => 'inkness_social_section',
         'label' => __('Social Icon Effects', 'inkness'),
         'type' => 'select',
         'choices' => $social_icon_styles,
       )
    );

	$social_count = count($social_networks);

	for ($x = 1 ; $x <= ($social_count - 4) ; $x++) :

		$wp_customize->add_setting(
			'inkness_social_'.$x, array(
				'sanitize_callback' => 'inkness_sanitize_social',
				'default' => 'none'
			));

		$wp_customize->add_control( 'inkness_social_'.$x, array(
					'settings' => 'inkness_social_'.$x,
					'label' => __('Icon ','inkness').$x,
					'section' => 'inkness_social_section',
					'type' => 'select',
					'choices' => $social_networks,
		));

		$wp_customize->add_setting(
			'inkness_social_url'.$x, array(
				'sanitize_callback' => 'esc_url_raw'
			));

		$wp_customize->add_control( 'inkness_social_url'.$x, array(
					'settings' => 'inkness_social_url'.$x,
					'description' => __('Icon ','inkness').$x.__(' Url','inkness'),
					'section' => 'inkness_social_section',
					'type' => 'url',
					'choices' => $social_networks,
		));

	endfor;

	function inkness_sanitize_social( $input ) {
		$social_networks = array(
					'none' ,
					'facebook',
					'twitter',
					'google-plus',
					'instagram',
					'rss',
					'vine',
					'vimeo-square',
					'youtube',
					'flickr',
					'pinterest-p',
				);
		if ( in_array($input, $social_networks) )
			return $input;
		else
			return '';
	}
}
add_action('customize_register', 'inkness_customize_register_social');