<?php
/**
 * Homepage — composes all template-parts that make up the marketing site.
 *
 * @package evag
 */

get_header(); ?>

<main id="primary">
	<?php
	get_template_part( 'template-parts/homepage/hero' );
	get_template_part( 'template-parts/homepage/trust-band' );
	get_template_part( 'template-parts/homepage/glass-selector' );
	get_template_part( 'template-parts/homepage/services' );
	get_template_part( 'template-parts/homepage/we-come-to-you' );
	get_template_part( 'template-parts/homepage/how-it-works' );
	get_template_part( 'template-parts/homepage/insurance-adas' );
	get_template_part( 'template-parts/homepage/recent-work' );
	get_template_part( 'template-parts/homepage/reviews' );
	get_template_part( 'template-parts/homepage/service-areas' );
	get_template_part( 'template-parts/homepage/quote-form' );
	get_template_part( 'template-parts/homepage/faq' );
	get_template_part( 'template-parts/homepage/blog' );
	get_template_part( 'template-parts/homepage/final-cta' );
	?>
</main>

<?php get_footer();
