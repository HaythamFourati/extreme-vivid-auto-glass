<?php
/**
 * Generic fallback template. The marketing site is single-page (front-page.php).
 *
 * @package evag
 */

get_header(); ?>

<main id="primary" style="background:#0C0D0F;color:#fff;min-height:60vh;padding:clamp(80px,12vw,160px) clamp(16px,4vw,40px)">
	<div style="max-width:720px;margin:0 auto">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article style="margin-bottom:48px">
					<h1 style="font-family:'Saira Condensed',sans-serif;font-weight:800;font-size:clamp(32px,5vw,56px);text-transform:uppercase;line-height:1;margin-bottom:18px"><?php the_title(); ?></h1>
					<div style="font-size:16px;line-height:1.6;color:#C2C7CD"><?php the_content(); ?></div>
				</article>
			<?php endwhile; ?>
		<?php else : ?>
			<h1 style="font-family:'Saira Condensed',sans-serif;font-weight:800;font-size:clamp(32px,5vw,56px);text-transform:uppercase;line-height:1;margin-bottom:18px"><?php esc_html_e( 'Nothing here yet.', 'evag' ); ?></h1>
			<p style="color:#9AA1AB;font-size:16px;line-height:1.6"><?php esc_html_e( 'Head back to the homepage to request a quote or call us.', 'evag' ); ?></p>
		<?php endif; ?>
	</div>
</main>

<?php get_footer();
