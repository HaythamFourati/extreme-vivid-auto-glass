<?php
/**
 * Template Name: Blog
 * Template Post Type: page
 *
 * @package evag
 */

get_header();

$paged = max( 1, (int) get_query_var( 'paged' ), (int) get_query_var( 'page' ) );
$blog_query = new WP_Query(
	array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => (int) get_option( 'posts_per_page', 10 ),
		'paged'               => $paged,
		'ignore_sticky_posts' => false,
	)
);

get_template_part(
	'template-parts/blog/archive',
	null,
	array(
		'query' => $blog_query,
	)
);

get_footer();
