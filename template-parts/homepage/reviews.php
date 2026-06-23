<?php
/**
 * Reviews — Google review carousel on the light surface.
 *
 * @package evag
 */
$evag = evag_config();
?>

<section id="reviews" style="background:#F5F6F8;color:#14161A;padding:clamp(64px,9vw,120px) clamp(16px,4vw,40px)">
	<div style="max-width:1280px;margin:0 auto">
		<div data-reveal style="display:flex;flex-wrap:wrap;align-items:flex-end;justify-content:space-between;gap:24px;margin-bottom:40px">
			<div style="max-width:640px">
				<div class="evag-eyebrow evag-eyebrow--ink"><?php esc_html_e( 'Reviews', 'evag' ); ?></div>
				<h2 style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:clamp(30px,4.2vw,52px);line-height:1.02;text-transform:uppercase;margin:0"><?php /* translators: %d: number of reviews */ printf( esc_html__( '%d reviews.', 'evag' ), (int) $evag['reviews_count'] ); ?> <span style="color:#E01627"><?php esc_html_e( 'Every one is five stars.', 'evag' ); ?></span></h2>
			</div>
			<a href="<?php echo esc_url( $evag['reviews_link'] ); ?>" target="_blank" rel="noopener" style="display:flex;align-items:center;gap:18px;background:#fff;border:1px solid #E4E7EB;border-radius:4px;padding:18px 22px;box-shadow:0 12px 30px -18px rgba(0,0,0,.35);text-decoration:none">
				<div style="text-align:center;line-height:1;padding-right:18px;border-right:1px solid #ECEEF1">
					<span style="display:block;font-family:'Saira Condensed',sans-serif;font-weight:800;font-size:54px;color:#E01627">5.0</span>
					<span style="display:block;color:#E01627;font-size:14px;letter-spacing:3px;margin-top:4px">★★★★★</span>
				</div>
				<div style="line-height:1.25">
					<span style="display:flex;align-items:center;gap:7px;font-family:'IBM Plex Mono',monospace;font-size:10.5px;letter-spacing:.12em;text-transform:uppercase;color:#3C8C4E"><span style="width:7px;height:7px;border-radius:50%;background:#34A853"></span><?php esc_html_e( 'Live · Google Business Profile', 'evag' ); ?></span>
					<span style="display:block;font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:26px;text-transform:uppercase;color:#14161A;margin-top:6px"><?php /* translators: %d: number of reviews */ printf( esc_html__( '%d Verified Reviews', 'evag' ), (int) $evag['reviews_count'] ); ?></span>
					<span style="display:block;font-family:'IBM Plex Mono',monospace;font-size:11px;color:#84898F;margin-top:3px"><?php esc_html_e( '100% five-star · Read on Google →', 'evag' ); ?></span>
				</div>
			</a>
		</div>

		<div style="display:flex;align-items:center;justify-content:space-between;gap:16px;margin-bottom:16px;flex-wrap:wrap">
			<span style="font-family:'IBM Plex Mono',monospace;font-size:11.5px;letter-spacing:.06em;color:#666B72"><?php esc_html_e( 'Trusted by local drivers with over 100 Google reviews · swipe or drag →', 'evag' ); ?></span>
			<div style="display:flex;align-items:center;gap:14px">
				<div data-reviews-dots aria-hidden="true" style="display:flex;gap:6px"></div>
				<div style="display:flex;gap:8px">
					<button type="button" data-reviews-prev aria-label="<?php esc_attr_e( 'Previous reviews', 'evag' ); ?>" style="width:46px;height:46px;display:flex;align-items:center;justify-content:center;background:#fff;border:1px solid #D5DAE0;border-radius:4px;font-size:20px;color:#14161A;cursor:pointer;transition:border-color .14s,color .14s,opacity .14s">←</button>
					<button type="button" data-reviews-next aria-label="<?php esc_attr_e( 'Next reviews', 'evag' ); ?>" style="width:46px;height:46px;display:flex;align-items:center;justify-content:center;background:#fff;border:1px solid #D5DAE0;border-radius:4px;font-size:20px;color:#14161A;cursor:pointer;transition:border-color .14s,color .14s,opacity .14s">→</button>
				</div>
			</div>
		</div>

		<div data-reviews-viewport style="overflow:hidden">
			<div data-reviews-track style="display:flex;gap:16px;padding:4px 0 16px;transition:transform .45s cubic-bezier(.4,0,.2,1);will-change:transform">
				<?php foreach ( $evag['reviews'] as $r ) : ?>
					<article style="flex:0 0 clamp(280px,84vw,360px);background:#fff;border:1px solid #E4E7EB;border-radius:4px;padding:26px 24px;display:flex;flex-direction:column;min-height:248px;box-shadow:0 14px 34px -22px rgba(0,0,0,.35)">
						<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px">
							<span style="color:#E01627;font-size:16px;letter-spacing:3px">★★★★★</span>
							<span style="width:24px;height:24px;border-radius:50%;border:1px solid #E4E7EB;display:flex;align-items:center;justify-content:center;font-family:'Saira Condensed',sans-serif;font-weight:800;font-size:15px;color:#4285F4">G</span>
						</div>
						<p style="font-size:15px;color:#33373C;line-height:1.6;flex:1;margin:0"><?php echo esc_html( $r['text'] ); ?></p>
						<div style="display:flex;align-items:center;gap:12px;margin-top:20px;padding-top:18px;border-top:1px solid #EDEFF2">
							<span style="width:42px;height:42px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:18px;color:#fff;background:<?php echo esc_attr( $r['color'] ); ?>"><?php echo esc_html( $r['initial'] ); ?></span>
							<span style="line-height:1.3">
								<span style="display:block;font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:17px;text-transform:uppercase;color:#14161A"><?php echo esc_html( $r['name'] ); ?></span>
								<span style="display:block;font-family:'IBM Plex Mono',monospace;font-size:11px;color:#9AA1AB"><?php echo esc_html( $r['meta'] ); ?></span>
							</span>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
		<p style="margin:14px 0 0;font-family:'IBM Plex Mono',monospace;font-size:11.5px;color:#84898F"><a href="<?php echo esc_url( $evag['reviews_link'] ); ?>" target="_blank" rel="noopener" style="color:#1E7FA6;text-decoration:underline;text-underline-offset:2px"><?php /* translators: %d: number of reviews */ printf( esc_html__( 'Read all %d reviews on Google →', 'evag' ), (int) $evag['reviews_count'] ); ?></a></p>
	</div>
</section>
