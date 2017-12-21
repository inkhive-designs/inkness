<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Inkness
 */
?>
	</div><!-- #content -->

<?php get_sidebar('footer'); ?>


<footer id="colophon" class="site-footer row" role="contentinfo">
	<div class="container">
		<div class="site-info container col-md-12">
            <?php printf( __( 'Theme Designed by %1$s.', 'inkness' ), '<a href="'.esc_url("http://inkhive.com/").'" rel="nofollow">InkHive</a>' ); ?>
            <div class="clearfix"></div>
            <?php echo ( get_theme_mod('inkness_footer_text') == '' ) ? ('&copy; '.date_i18n( __( 'Y', 'inkness' ) ).' '.get_bloginfo('name').__('. All Rights Reserved. ','inkness')) : esc_html(get_theme_mod('inkness_footer_text')); ?>
        </div>
	</div>   
	</footer><!-- #colophon -->
	
</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>