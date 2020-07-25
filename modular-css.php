<?php

/**
  Enqueues a css file from the parent theme.
  
  The id assigned to the stylesheet is the basename of the parent theme folder, followed by the stylesheet filename (no extension).
*/
function parent_css( $slug )
{
	$root = get_template_directory_uri();
	$group = basename($root);
	
	wp_enqueue_style( "$group-$slug", "$root/$slug.css", array(), ''); 
}

/**
  Enqueues a css file from the child theme.
  
  The id assigned to the stylesheet is the basename of the child theme folder, followed by the stylesheet filename (no extension).
*/
function child_css( $slug )
{
	$root = get_stylesheet_directory_uri();
	$group = basename($root);
	
	wp_enqueue_style( "$group-$slug", "$root/css/$slug.css", array('_s-style'), '1');
}

/**
  Enqueue all of the scripts for this theme.
*/
function child_scripts_styles() 
{
//	parent_css('style');
	
	child_css('menu-brainstorm');
	child_css('front-page');
	child_css('content-brainstorm');
	child_css('no-footer');
	child_css('page-header');
	child_css('archive');
}
add_action( 'wp_enqueue_scripts', 'child_scripts_styles' );

?>