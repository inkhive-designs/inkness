<header id="masthead" class="site-header row container" role="banner">
    <div class="site-branding col-md-6 col-xs-12">
        <?php if ( inkness_has_logo() ) : ?>
        <div id="site-logo">
            <?php inkness_logo(); ?>
        </div>
        <?php endif; ?>
        <h1 class="site-title logo-container">
           <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        </h1>

    </div>

    <div id="social-icons" class="col-md-5 col-xs-12">
        <?php get_template_part('modules/social-icons/social', 'fa'); ?>
    </div>


</header><!-- #masthead -->