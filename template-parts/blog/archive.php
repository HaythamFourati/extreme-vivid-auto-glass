<?php
/**
 * Blog archive layout shared by home.php and page-blog.php.
 *
 * @package evag
 */

global $wp_query;

$blog_query = isset( $args['query'] ) && $args['query'] instanceof WP_Query
	? $args['query']
	: $wp_query;
$current_page = max( 1, (int) get_query_var( 'paged' ), (int) get_query_var( 'page' ) );
?>

<main id="primary">
	<section class="evag-blog-hero">
		<div class="evag-blog-shell">
			<nav aria-label="<?php esc_attr_e( 'Breadcrumb', 'evag' ); ?>" class="evag-blog-breadcrumb">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'evag' ); ?></a>
				<span aria-hidden="true">/</span>
				<span><?php esc_html_e( 'Blog', 'evag' ); ?></span>
			</nav>
			<p class="evag-blog-kicker"><?php esc_html_e( 'Auto glass field notes', 'evag' ); ?></p>
			<h1><?php esc_html_e( 'Clear advice for Maryland drivers', 'evag' ); ?></h1>
			<p class="evag-blog-intro"><?php esc_html_e( 'Practical answers about windshield damage, replacement, insurance, ADAS recalibration and keeping your vehicle safe.', 'evag' ); ?></p>
		</div>
		<span class="evag-rake" aria-hidden="true"></span>
	</section>

	<section class="evag-blog-index">
		<div class="evag-blog-shell">
			<?php if ( $blog_query->have_posts() ) : ?>
				<?php
				// On the first page, promote the newest post to a full-width lead.
				$use_lead = ( 1 === $current_page );
				$rendered = 0;
				?>
				<?php if ( $use_lead ) : ?>
					<?php
					$blog_query->the_post();
					get_template_part( 'template-parts/blog/lead' );
					$rendered++;
					?>
				<?php endif; ?>

				<?php if ( $blog_query->post_count > $rendered ) : ?>
					<div class="evag-blog-grid<?php echo $use_lead ? ' evag-blog-grid--secondary' : ''; ?>">
						<?php
						while ( $blog_query->have_posts() ) :
							$blog_query->the_post();
							get_template_part( 'template-parts/blog/card' );
						endwhile;
						?>
					</div>
				<?php endif; ?>

				<?php
				$pagination = paginate_links(
					array(
						'total'     => (int) $blog_query->max_num_pages,
						'current'   => $current_page,
						'mid_size'  => 1,
						'prev_text' => __( '← Previous', 'evag' ),
						'next_text' => __( 'Next →', 'evag' ),
						'type'      => 'list',
					)
				);
				?>
				<?php if ( $pagination ) : ?>
					<nav class="evag-blog-pagination" aria-label="<?php esc_attr_e( 'Blog pagination', 'evag' ); ?>">
						<?php echo wp_kses_post( $pagination ); ?>
					</nav>
				<?php endif; ?>
			<?php else : ?>
				<div class="evag-blog-empty">
					<h2><?php esc_html_e( 'Articles are on the way', 'evag' ); ?></h2>
					<p><?php esc_html_e( 'Need an answer now? Call us or request an auto glass quote.', 'evag' ); ?></p>
					<a href="<?php echo esc_url( home_url( '/#quote' ) ); ?>"><?php esc_html_e( 'Request a quote →', 'evag' ); ?></a>
				</div>
			<?php endif; ?>
		</div>
	</section>
</main>

<?php wp_reset_postdata(); ?>
