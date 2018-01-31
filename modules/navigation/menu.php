<div class="default-nav-wrapper col-md-8 col-xs-12">
    <nav id="site-navigation" class="main-navigation" role="navigation">
        <div id="nav-container">
            <?php
            $walker = has_nav_menu('primary') ? new Inkness_Menu_With_Icon : '';
            //Display the Menu.
            wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => $walker ) ); ?>
        </div>
    </nav><!-- #site-navigation -->
</div>