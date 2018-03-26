<?php
/**
 * The template for displaying Category pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Inkness
 */

get_header(); ?>

<div id="primary" class="content-area <?php do_action('inkness_primary-width') ?>">
    <main id="main" class="site-main" role="main">

        <?php if ( have_posts() ) : ?>

            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <?php
                /* Include the Post-Format-specific template for the content.
                 */
                do_action('inkness_blog_layout');
                ?>

            <?php endwhile; ?>

            <?php inkness_content_nav( 'nav-below' ); ?>

        <?php else : ?>

            <?php get_template_part( 'modules/content/content', 'none' ); ?>

        <?php endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_sidebar('footer'); ?>
<?php get_footer(); ?>