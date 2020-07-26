<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */
?>
</php get_header(); ?>

	<div class="site-content-area">
		<?php
            while ( have_posts() ) : the_post();

                $type = get_post_type();
                $format = get_post_format();

                locate_template( 
                    array(
                        "template-parts/content-$type-$format.php"
                    ,   "template-parts/content-$type.php"
                    ,   "template-parts/content-$format.php"
                    ,   "template-parts/content.php"
                    )
                ,   true	// Autoload
                );

                the_post_navigation();

            endwhile;
		?>
	</div>

<?php
    get_sidebar();
    get_footer();
