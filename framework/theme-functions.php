<?php
/*
 * @package inkness, Copyright Rohit Tripathi, rohitink.com
 * This file contains Custom Theme Related Functions.
 */


//Import Admin Modules
require get_template_directory() . '/framework/admin_modules/admin_styles.php';
require get_template_directory() . '/framework/admin_modules/register_styles.php';
require get_template_directory() . '/framework/admin_modules/register_widgets.php';
require get_template_directory() . '/framework/admin_modules/theme_setup.php';
require get_template_directory() . '/framework/admin_modules/nav_walkers.php';
require get_template_directory() . '/framework/admin_modules/logo_compatibility.php';


/*
 * Pagination Function. Implements core paginate_links function.
 */
function inkness_pagination() {
    global $wp_query;
    $big = 12345678;
    $page_format = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array'
    ) );
    if( is_array($page_format) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<div class="pagination"><div><ul>';
        echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
        foreach ( $page_format as $page ) {
            echo "<li>$page</li>";
        }
        echo '</ul></div></div>';
    }
}


/*
** Function to check if Sidebar is enabled on Current Page 
*/

function inkness_load_sidebar() {
	$load_sidebar = true;
	if ( get_theme_mod('inkness_disable_sidebar') ) :
		$load_sidebar = false;
	elseif( get_theme_mod('inkness_disable_sidebar_home') && is_home() )	:
		$load_sidebar = false;
	elseif( get_theme_mod('inkness_disable_sidebar_front') && is_front_page() ) :
		$load_sidebar = false;
	endif;
	
	return  $load_sidebar;
}

/*
**	Determining Sidebar and Primary Width
*/
function inkness_primary_class() {
	$sw = get_theme_mod('inkness_sidebar_width',4);
	$class = "col-md-".(12-$sw);
	
	if ( !inkness_load_sidebar() ) 
		$class = "col-md-12";
	
	echo $class;
}
add_action('inkness_primary-width', 'inkness_primary_class');

function inkness_secondary_class() {
	$sw = get_theme_mod('inkness_sidebar_width',4);
	$class = "col-md-".$sw;
	
	echo $class;
}
add_action('inkness_secondary-width', 'inkness_secondary_class');


/*
**	Helper Function to Convert Colors
*/
function inkness_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);
   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
   //return $rgb; // returns an array with the rgb values
}
function inkness_fade($color, $val) {
	return "rgba(".inkness_hex2rgb($color).",". $val.")";
}


/*
** Function to Get Theme Layout 
*/
function inkness_get_blog_layout(){
	$ldir = 'framework/layouts/content';
	if (get_theme_mod('inkness_blog_layout') ) :
		get_template_part( $ldir , get_theme_mod('inkness_blog_layout') );
	else :
		get_template_part( $ldir ,'grid');	
	endif;	
}
add_action('inkness_blog_layout', 'inkness_get_blog_layout');

/*
** Function to Set Main Class
*/
function inkness_get_main_class(){

	$layout = get_theme_mod('inkness_blog_layout');
	if (strpos($layout,'inkness') !== false) {
	    	echo 'inkness-main';
	}
}
add_action('inkness_main-class', 'inkness_get_main_class');

/*
** Load WooCommerce Compatibility FIle
*/
if ( class_exists('woocommerce') ) :
	require get_template_directory() . '/framework/woocommerce.php';
endif;


/*
** Load Custom Widgets
*/

require get_template_directory() . '/framework/widgets/recent-posts.php';


