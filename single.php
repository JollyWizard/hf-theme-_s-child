<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

      $type = get_post_type();
			$format = get_post_format();

			locate_template( array(
				"template-parts/content-$type-$format.php"
			,	"template-parts/content-$type.php"
			, "template-parts/content-$format.php"
			, "template-parts/content.php"
		  )
			, true	// Autoload
		  );

			the_post_navigation();

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
