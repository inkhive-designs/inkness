<?php
/*
** Template to Render Social Icons on Top Bar
*/
$social_icons_styles = get_theme_mod('inkness_social_icon_style','hvr-bounce-to-bottom');
for ($i = 1; $i < 8; $i++) : 
	$social = esc_attr( get_theme_mod('inkness_social_'.$i) );
	if ( ($social != 'none') && ($social != '') ) : ?>
	<a class="<?php echo $social_icons_styles; ?>" href="<?php echo esc_url( get_theme_mod('inkness_social_url'.$i) ); ?>">
        <i class="fa fa-fw fa-<?php echo $social; ?>"></i>
    </a>
	<?php endif;

endfor; ?>