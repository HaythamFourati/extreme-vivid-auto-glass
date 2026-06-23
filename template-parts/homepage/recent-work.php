<?php
/**
 * Recent work — before/after pairs with hover reveal.
 *
 * @package evag
 */
$pairs = array(
	array(
		'before' => 'https://ev-autoglass.com/wp-content/uploads/2023/10/IMG_3686.jpg',
		'after'  => 'https://ev-autoglass.com/wp-content/uploads/2023/10/IMG_3736.jpg',
		'alt'    => __( 'Windshield chip repair', 'evag' ),
		'label'  => __( 'Chip Repair', 'evag' ),
	),
	array(
		'before' => 'https://ev-autoglass.com/wp-content/uploads/2023/10/IMG_3712.jpg',
		'after'  => 'https://ev-autoglass.com/wp-content/uploads/2023/10/IMG_3713.jpg',
		'alt'    => __( 'Windshield crack repair', 'evag' ),
		'label'  => __( 'Crack Repair', 'evag' ),
	),
	array(
		'before' => 'https://ev-autoglass.com/wp-content/uploads/2023/10/IMG_3758.jpg',
		'after'  => 'https://ev-autoglass.com/wp-content/uploads/2023/10/IMG_3759.jpg',
		'alt'    => __( 'Windshield stone damage repair', 'evag' ),
		'label'  => __( 'Stone Damage', 'evag' ),
	),
	array(
		'before' => 'https://ev-autoglass.com/wp-content/uploads/2023/11/IMG_1838.jpg',
		'after'  => 'https://ev-autoglass.com/wp-content/uploads/2023/11/IMG_1839.jpg',
		'alt'    => __( 'Windshield replacement', 'evag' ),
		'label'  => __( 'Replacement', 'evag' ),
	),
	array(
		'before' => 'https://ev-autoglass.com/wp-content/uploads/2023/11/IMG_3640-scaled.jpeg',
		'after'  => 'https://ev-autoglass.com/wp-content/uploads/2023/11/IMG_3642.jpg',
		'alt'    => __( 'Windshield chip before and after', 'evag' ),
		'label'  => __( 'Chip Repair', 'evag' ),
	),
	array(
		'before' => 'https://ev-autoglass.com/wp-content/uploads/2023/11/IMG_2321.jpg',
		'after'  => 'https://ev-autoglass.com/wp-content/uploads/2023/11/IMG_2322.jpg',
		'alt'    => __( 'Windshield damage repair', 'evag' ),
		'label'  => __( 'Damage Repair', 'evag' ),
	),
);
?>

<section id="work" style="background:#0C0D0F;padding:clamp(64px,9vw,120px) clamp(16px,4vw,40px)">
	<div style="max-width:1280px;margin:0 auto">
		<div data-reveal style="display:flex;flex-wrap:wrap;align-items:flex-end;justify-content:space-between;gap:18px;margin-bottom:44px">
			<div>
				<div class="evag-eyebrow"><?php esc_html_e( 'Before & After', 'evag' ); ?></div>
				<h2 style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:clamp(30px,4.2vw,52px);line-height:1.02;text-transform:uppercase;margin:0"><?php esc_html_e( 'Real results from real jobs', 'evag' ); ?></h2>
			</div>
			<p style="max-width:340px;color:#9AA1AB;font-size:14px;line-height:1.5;margin:0"><?php esc_html_e( 'Drag the slider on each photo to see the damage cleared and clarity restored.', 'evag' ); ?></p>
		</div>

		<div class="evag-ba-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:18px">
			<?php foreach ( $pairs as $i => $p ) : ?>
				<figure data-reveal data-ba-slider class="evag-ba-card" style="--reveal-delay:<?php echo (int) ( $i * 60 ); ?>ms;--ba-pos:50%;position:relative;border-radius:6px;overflow:hidden;aspect-ratio:4/3;margin:0;touch-action:none;user-select:none;-webkit-user-select:none;background:#15171B">
					<img src="<?php echo esc_url( $p['after'] ); ?>" alt="<?php echo esc_attr( $p['alt'] ); ?> — after" loading="lazy" decoding="async" width="800" height="600" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;display:block">
					<img src="<?php echo esc_url( $p['before'] ); ?>" alt="<?php echo esc_attr( $p['alt'] ); ?> — before" loading="lazy" decoding="async" width="800" height="600" class="evag-ba-before-img" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;display:block;clip-path:inset(0 calc(100% - var(--ba-pos)) 0 0);-webkit-clip-path:inset(0 calc(100% - var(--ba-pos)) 0 0)">
					<span style="position:absolute;left:12px;top:12px;font-family:'IBM Plex Mono',monospace;font-size:10px;letter-spacing:.14em;text-transform:uppercase;color:#fff;background:#E01627;padding:5px 10px;border-radius:3px;z-index:3;pointer-events:none"><?php esc_html_e( 'Before', 'evag' ); ?></span>
					<span style="position:absolute;right:12px;top:12px;font-family:'IBM Plex Mono',monospace;font-size:10px;letter-spacing:.14em;text-transform:uppercase;color:#0C0D0F;background:#fff;padding:5px 10px;border-radius:3px;z-index:3;pointer-events:none"><?php esc_html_e( 'After', 'evag' ); ?></span>
					<div class="evag-ba-handle" aria-hidden="true" style="position:absolute;top:0;bottom:0;left:var(--ba-pos);width:2px;background:#fff;transform:translateX(-50%);z-index:4;pointer-events:none;box-shadow:0 0 0 1px rgba(0,0,0,.15)">
						<div style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:42px;height:42px;border-radius:50%;background:#fff;display:flex;align-items:center;justify-content:center;box-shadow:0 8px 24px -6px rgba(0,0,0,.5);color:#0C0D0F;gap:1px">
							<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"></polyline></svg>
							<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 6 15 12 9 18"></polyline></svg>
						</div>
					</div>
					<figcaption style="position:absolute;left:50%;transform:translateX(-50%);bottom:12px;z-index:3;font-family:'IBM Plex Mono',monospace;font-size:10px;letter-spacing:.12em;text-transform:uppercase;color:#fff;background:rgba(12,13,15,.78);padding:5px 12px;border-radius:3px;backdrop-filter:blur(4px);pointer-events:none;white-space:nowrap"><?php echo esc_html( $p['label'] ); ?></figcaption>
				</figure>
			<?php endforeach; ?>
		</div>

		<style>
			@media (max-width: 900px) {
				.evag-ba-grid { grid-template-columns: repeat(2, 1fr) !important; }
			}
			@media (max-width: 580px) {
				.evag-ba-grid { grid-template-columns: 1fr !important; }
				[data-ba-slider] { aspect-ratio: 3/2 !important; }
			}
			[data-ba-slider] { cursor: ew-resize; }
		</style>
	</div>
</section>
