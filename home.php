<?php
/**
 * WordPress Posts page.
 *
 * @package evag
 */

get_header();

global $wp_query;

get_template_part(
	'template-parts/blog/archive',
	null,
	array(
		'query' => $wp_query,
	)
);

get_footer();
