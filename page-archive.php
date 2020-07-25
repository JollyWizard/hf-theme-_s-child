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
	
	  /* Legacy theme uses wpcf namespace (from custom fields plugin tool). */
	  //, 'meta_key' => 'wpcf-number'
	  
	  /* Transition theme accepts both key formats. */
	  , 'meta_query' => array(
			'relation' => 'OR'
		,	'wpcf-format' => array (
				'key' => 'wpcf-number'
			,	'type' => 'NUMERIC'
			)
		,	'hf-format' => array (
				'key' => 'hf-session-number'
			,	'type' => 'NUMERIC'
			)
		)

	  /* Old setting was 'meta_value_num', but transition uses complex query and can't use that. */
	  /* Named meta queries is prefered syntax */
	  , 'orderby' => array(
		  'wpcf-format' => 'ASC', 'hf-format' => 'ASC'
	  	)
	  );
	  $wp_query = new WP_Query($args);
	  ?>

	  <div class='session-links'>

		<?php
		while ( have_posts() ) : the_post();
		$session_number = get_post_meta(get_the_ID(), 'wpcf-number', true);
		if ( ! $session_number ) 
		{
			$session_number = get_post_meta(get_the_ID(), 'hf-session-number', true);
		}
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
