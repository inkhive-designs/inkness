<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Inkness
 */
?>
<?php get_template_part('modules/header/head'); ?>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<div id="header-top">
        <?php get_template_part('modules/header/masthead'); ?>
    </div>


    <div id="header-2">
        <div class="mobile-menu">
            <?php get_template_part('modules/navigation/mobile', 'menu'); ?>
        </div>

        <div class="container">
            <?php get_template_part('modules/navigation/menu'); ?>

		  
		<div id="top-search" class="col-md-4 col-xs-12">
			<?php get_search_form(); ?>
		</div>
		</div>
	</div>

	<?php get_template_part('framework/featured-components/slider', 'nivo'); ?>
	
		<div id="content" class="site-content container">
