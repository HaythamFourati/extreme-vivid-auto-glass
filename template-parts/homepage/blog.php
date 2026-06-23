<?php
/**
 * Recent blog articles.
 *
 * @package evag
 */

$blog_query = new WP_Query(
	array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => 3,
		'ignore_sticky_posts' => true,
	)
);
?>

<?php if ( $blog_query->have_posts() ) : ?>
	<section class="evag-home-blog">
		<div class="evag-blog-shell">
			<div data-reveal class="evag-home-blog__header">
				<div>
					<p class="evag-blog-kicker"><?php esc_html_e( 'From the field', 'evag' ); ?></p>
					<h2><?php esc_html_e( 'Auto glass advice that keeps you moving', 'evag' ); ?></h2>
				</div>
				<a href="<?php echo esc_url( evag_blog_url() ); ?>"><?php esc_html_e( 'View all articles', 'evag' ); ?> <span aria-hidden="true">→</span></a>
			</div>

			<?php $rendered = 0; ?>
			<?php
			$blog_query->the_post();
			get_template_part( 'template-parts/blog/lead' );
			$rendered++;
			?>

			<?php if ( $blog_query->post_count > $rendered ) : ?>
				<div class="evag-blog-grid evag-blog-grid--secondary">
					<?php
					while ( $blog_query->have_posts() ) :
						$blog_query->the_post();
						get_template_part( 'template-parts/blog/card' );
					endwhile;
					?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
