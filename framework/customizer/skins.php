<?php	
function inkness_customize_register_skins( $wp_customize ) {
	
	$wp_customize->get_section('colors')->title = __('Theme Skin & Colors','inkness');
	$wp_customize->get_section('colors')->panel ='inkness_design_panel';

	
	$wp_customize->add_setting(
		'inkness_skin',
		array(
			'default'=> 'default',
			'sanitize_callback' => 'inkness_sanitize_skin' 
			)
	);
	
	$skins = array( 'default' => __('Default(Inkness)','inkness'),
					'green' => __('Green','inkness'),
                    'yellow' => __('Yellow', 'inkness'),
					);
	
	$wp_customize->add_control(
		'inkness_skin',array(
				'settings' => 'inkness_skin',
				'section'  => 'colors',
				'label' => __('Choose Skin','inkness'),
				'description' => __('Free Version of Inkness Supports 3 Different Skin Colors.','inkness'),
				'type' => 'select',
				'choices' => $skins,
			)
	);
	
	function inkness_sanitize_skin( $input ) {
		if ( in_array($input, array('default','green', 'yellow') ) )
			return $input;
		else
			return '';
	}
}
add_action('customize_register', 'inkness_customize_register_skins');
 