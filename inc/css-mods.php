<?php
/* 
**   Custom Modifcations in CSS depending on user settings.
*/

function inkness_custom_css_mods() {
	
	$custom_css = "";

	//Check Jetpack is active
	if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) )
		$custom_css .= '.pagination { display: none; }';

    if ( get_theme_mod('inkness_title_font') ) :
        $custom_css .= ".title-font, h1, h2, .sections-title { font-family: ".esc_html(get_theme_mod('inkness_title_font','Open Sans'))."; }";
    endif;

    if ( get_theme_mod('inkness_body_font') ) :
        $custom_css .= "body, h2.site-description { font-family: ".esc_html( get_theme_mod('inkness_body_font','Khula') )."; }";
    endif;

    if ( !display_header_text() ) :
		$custom_css .= "#masthead .site-branding #text-title-desc { display: none; }";
	endif;


	if(!is_home() && is_front_page()):
        if( get_theme_mod('inkness_page_title', true)):
            $custom_css .= "#primary-mono .entry-header { display:none; }";
	    endif;
	endif;

	if(!is_home()):
        if( get_theme_mod('inkness_contact_page_title', true)):
            $custom_css .= "#primary-mono .contact-us .entry-header { display:none; }";
	    endif;
	endif;


    wp_add_inline_style( 'inkness-main-theme-style', wp_strip_all_tags($custom_css) );
	
}

add_action('wp_enqueue_scripts', 'inkness_custom_css_mods');