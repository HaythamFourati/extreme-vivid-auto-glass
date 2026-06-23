<?php
/**
 * Reusable blog article card.
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
?>

<article data-reveal class="evag-blog-card">
	<a href="<?php the_permalink(); ?>" class="evag-blog-card__link">
		<div class="evag-blog-card__media">
			<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" loading="lazy" decoding="async">
			<span class="evag-blog-card__cat"><?php echo esc_html( $category ); ?></span>
		</div>
		<div class="evag-blog-card__body">
			<div class="evag-blog-card__meta">
				<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
				<span aria-hidden="true">/</span>
				<span><?php echo esc_html( sprintf( __( '%d min read', 'evag' ), $read_min ) ); ?></span>
			</div>
			<h3><?php the_title(); ?></h3>
			<p><?php echo esc_html( wp_trim_words( $excerpt, 22, '…' ) ); ?></p>
			<span class="evag-blog-card__cta"><?php esc_html_e( 'Read article', 'evag' ); ?> <span aria-hidden="true">→</span></span>
		</div>
	</a>
</article>
