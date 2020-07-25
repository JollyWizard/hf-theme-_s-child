<?php
/*
   Template Name: Session Archives

   @package higherforces
   @subpackage jollywizard
*/

get_header();
?>

<header class='page-header'>
  <h1 class='page-title'>Session Archive</h1>
</header>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

  <section class='session archive'>
	  <?php
	  $args = array(
		'post_type' => 'session'
	  , 'nopaging' => 'true'
	  , 'meta_key' => 'wpcf-number'
	  , 'order' => 'ASC'
	  , 'orderby' => 'meta_value_num'
	  );
	  $wp_query = new WP_Query($args);
	  ?>

	  <div class='session-links'>

		<?php
		while ( have_posts() ) : the_post();
		$session_number = get_post_meta(get_the_ID(), 'wpcf-number', true);
		?>
			<a href='<?php echo get_permalink() ?>'>
				<?php echo $session_number ?>
			</a>
		<?php
		endwhile; // End of the loop.
		?>

	  </div>

  </section>
  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
