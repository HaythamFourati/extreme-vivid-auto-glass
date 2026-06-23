<?php
/**
 * Single blog article.
 *
 * @package evag
 */

get_header();
?>

<div class="evag-read-progress" aria-hidden="true"><span data-read-progress class="evag-read-progress__bar"></span></div>

<main id="primary">
	<?php
	while ( have_posts() ) :
		the_post();
		$categories = get_the_category();
		$category   = $categories ? $categories[0]->name : __( 'Auto Glass', 'evag' );
		$read_min   = max( 1, (int) ceil( str_word_count( wp_strip_all_tags( get_the_content() ) ) / 220 ) );
		?>
		<article <?php post_class( 'evag-article' ); ?>>
			<header class="evag-article-hero">
				<div class="evag-article-shell">
					<nav aria-label="<?php esc_attr_e( 'Breadcrumb', 'evag' ); ?>" class="evag-blog-breadcrumb">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'evag' ); ?></a>
						<span aria-hidden="true">/</span>
						<a href="<?php echo esc_url( evag_blog_url() ); ?>"><?php esc_html_e( 'Blog', 'evag' ); ?></a>
						<span aria-hidden="true">/</span>
						<span><?php echo esc_html( $category ); ?></span>
					</nav>

					<div class="evag-article-meta">
						<span><?php echo esc_html( $category ); ?></span>
						<span aria-hidden="true">/</span>
						<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
						<span aria-hidden="true">/</span>
						<span><?php echo esc_html( sprintf( __( '%d min read', 'evag' ), $read_min ) ); ?></span>
					</div>
					<h1><?php the_title(); ?></h1>
					<?php if ( has_excerpt() ) : ?>
						<p class="evag-article-deck"><?php echo esc_html( get_the_excerpt() ); ?></p>
					<?php endif; ?>
				</div>
				<span class="evag-rake" aria-hidden="true"></span>
			</header>

			<div class="evag-article-main">
				<?php if ( has_post_thumbnail() ) : ?>
					<figure class="evag-article-featured">
						<?php the_post_thumbnail( 'full', array( 'loading' => 'eager', 'decoding' => 'async' ) ); ?>
					</figure>
				<?php endif; ?>

				<div class="evag-article-content">
					<?php the_content(); ?>
					<?php
					wp_link_pages(
						array(
							'before' => '<nav class="evag-page-links">' . esc_html__( 'Pages:', 'evag' ),
							'after'  => '</nav>',
						)
					);
					?>
				</div>

				<footer class="evag-article-footer">
					<div class="evag-article-categories">
						<span class="evag-article-categories__label"><?php esc_html_e( 'Filed under', 'evag' ); ?></span>
						<?php the_category( ' · ' ); ?>
					</div>
					<nav class="evag-post-nav" aria-label="<?php esc_attr_e( 'Post navigation', 'evag' ); ?>">
						<?php
						$prev_post = get_previous_post();
						$next_post = get_next_post();
						?>
						<?php if ( $prev_post ) : ?>
							<a class="evag-post-nav__item evag-post-nav__item--prev" href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>" rel="prev">
								<span class="evag-post-nav__dir"><?php esc_html_e( '← Previous', 'evag' ); ?></span>
								<span class="evag-post-nav__title"><?php echo esc_html( get_the_title( $prev_post ) ); ?></span>
							</a>
						<?php else : ?>
							<span aria-hidden="true"></span>
						<?php endif; ?>
						<?php if ( $next_post ) : ?>
							<a class="evag-post-nav__item evag-post-nav__item--next" href="<?php echo esc_url( get_permalink( $next_post ) ); ?>" rel="next">
								<span class="evag-post-nav__dir"><?php esc_html_e( 'Next →', 'evag' ); ?></span>
								<span class="evag-post-nav__title"><?php echo esc_html( get_the_title( $next_post ) ); ?></span>
							</a>
						<?php endif; ?>
					</nav>
				</footer>
			</div>
		</article>
	<?php endwhile; ?>

	<?php get_template_part( 'template-parts/homepage/final-cta' ); ?>
</main>

<script>
(function () {
	var bar = document.querySelector('[data-read-progress]');
	var article = document.querySelector('.evag-article-content');
	if (!bar || !article) return;
	var ticking = false;
	function update() {
		var rect = article.getBoundingClientRect();
		var vh = window.innerHeight || document.documentElement.clientHeight;
		var total = rect.height - vh;
		var scrolled = Math.min(Math.max(-rect.top, 0), Math.max(total, 0));
		var pct = total > 0 ? (scrolled / total) * 100 : 0;
		bar.style.transform = 'scaleX(' + (pct / 100) + ')';
		ticking = false;
	}
	function onScroll() {
		if (!ticking) { window.requestAnimationFrame(update); ticking = true; }
	}
	window.addEventListener('scroll', onScroll, { passive: true });
	window.addEventListener('resize', onScroll, { passive: true });
	update();
})();
</script>

<?php get_footer(); ?>
