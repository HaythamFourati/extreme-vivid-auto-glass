<?php
/**
 * Featured "lead" article — asymmetric, sheared-panel treatment.
 * Expects the current post to be set up in the loop.
 *
 * @package evag
 */

$evag       = evag_config();
$image      = get_the_post_thumbnail_url( get_the_ID(), 'large' );
$image      = $image ? $image : $evag['hero_image'];
$categories = get_the_category();
$category   = $categories ? $categories[0]->name : __( 'Auto Glass', 'evag' );
$excerpt    = get_the_excerpt();
$excerpt    = $excerpt ? $excerpt : wp_strip_all_tags( get_the_content() );
$read_min   = max( 1, (int) ceil( str_word_count( wp_strip_all_tags( get_the_content() ) ) / 220 ) );

$lead_label = isset( $args['label'] ) ? $args['label'] : __( 'Latest', 'evag' );
?>

<article data-reveal class="evag-blog-lead">
	<a href="<?php the_permalink(); ?>" class="evag-blog-lead__media" aria-hidden="true" tabindex="-1">
		<img src="<?php echo esc_url( $image ); ?>" alt="" loading="lazy" decoding="async">
		<span class="evag-blog-lead__tag"><?php echo esc_html( $lead_label ); ?></span>
	</a>
	<div class="evag-blog-lead__body">
		<div class="evag-blog-lead__meta">
			<span class="evag-blog-lead__cat"><?php echo esc_html( $category ); ?></span>
			<span aria-hidden="true">/</span>
			<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
			<span aria-hidden="true">/</span>
			<span><?php echo esc_html( sprintf( __( '%d min read', 'evag' ), $read_min ) ); ?></span>
		</div>
		<h3 class="evag-blog-lead__title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
		<p class="evag-blog-lead__excerpt"><?php echo esc_html( wp_trim_words( $excerpt, 38, '…' ) ); ?></p>
		<a href="<?php the_permalink(); ?>" class="evag-blog-lead__cta"><?php esc_html_e( 'Read the full article', 'evag' ); ?> <span aria-hidden="true">→</span></a>
	</div>
</article>
