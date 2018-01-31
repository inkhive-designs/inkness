<?php
/**
 * @package Inkness
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("inkness col-md-4 col-sm-4 col-xs-12"); ?>>
<div class="container article-wrapper">
	    <div class="featured-thumb col-md-12 col-xs-12">
            <?php if (has_post_thumbnail()) : ?>

                <a href="<?php the_permalink(); ?>">
	            <?php
		            the_post_thumbnail('homepage-banner');
	            ?>
	        </a>
            <?php else: ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
                <img src="<?php echo get_template_directory_uri()."/assets/images/placeholder.png"; ?>">
            </a>
            <?php endif; ?>
        </div>

    <div class="article-rest col-md-12">
	    <header class="entry-header">
	    	<h3 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

	    	<?php if ( 'post' == get_post_type() ) : ?>
	    	    <div class="entry-meta">
	    	    	<?php inkness_posted_on(); ?>
	    	    </div><!-- .entry-meta -->
	    	<?php endif; ?>
	    </header><!-- .entry-header -->

	    <?php if ( is_search() ) : // Only display Excerpts for Search ?>

            <div class="entry-summary">
	    	    <?php the_excerpt(); ?>
	        </div><!-- .entry-summary -->
	    <?php else : ?>
	        <div class="entry-content">
	    	    <?php the_excerpt(); ?>
	        </div><!-- .entry-content -->
	    <?php endif; ?>
	</div>
</div>
</article><!-- #post-## -->