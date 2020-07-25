<?php
/**
  Search form template part.

  Called by `get_the_search_from()`, if exists;
*/
?>

<!-- copied `from get_the_search_form()` -->
<form role="search" method="get" class="search-form" action="<?php echo home_url('/') ?>">
	<label>
		<span class="screen-reader-text"><?php _x( 'Search for:', 'label' ) ?></span>
		<input type="search" class="search-field" name="s"
			placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder' ) ?>"
			value="<?php echo get_search_query() ?>"
		/>
	</label>
</form>
