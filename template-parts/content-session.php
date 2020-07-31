
<article 
	class="session-article" 
	data-wp-post-class="<?php post_class(); ?>" 
	data-wp-post-id="<?php the_ID(); ?>"
>
	<header class="session-title">
		<?php the_title(); ?>
	</header>

	<aside class='wp-meta-aside'>
		<dl class='wp-meta-list'>
		<?php
			$metadata = get_metadata('post', get_the_ID());
		
			//@TODO: Filter metadata list (possible admin view).

			foreach($metadata as $meta_key => $meta_value)
			{
				echo("<dt class='wp-meta-key'>$meta_key</dt>");
				
				foreach($meta_value as $meta_element)
				{
					echo "<dd wp='wp-meta-value>$meta_element</dd>";
				}
			}
		?>	
		</dl>
	</aside>

	<aside class='soundcloud-aside' >
	<?php
		$sc_widget_base = 'https://w.soundcloud.com/player/?url=';
		$sc_urls = get_metadata('post', get_the_ID(), 'soundcloud_url');

		foreach($sc_urls as $sc_url)
		{
			echo '<div class="soundcloud-widget-div">';
				$widget_url = $sc_widget_base.$sc_url;
				echo "<iframe class='soundcloud-widget-iframe' src='$widget_url' width='100%'></iframe>";
			echo '</div>';
		}
	?>
	</aside>

	<main class="session-text">
		<?php the_content(); ?>
	</main>

	<nav class="page-navigation" >
	<?php
		wp_link_pages( 
			array(
				'before' => ''
			,	'after'  => ''
			) 
		);
	?>
	</div>

</article>
