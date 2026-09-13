<?php
/**
 * Glass selector — large tiles that pre-fill the quote form and scroll to it.
 *
 * @package evag
 */
$evag = evag_config();
?>

<section style="background:#0F1115;border-top:1px solid rgba(255,255,255,.07);border-bottom:1px solid rgba(255,255,255,.07);padding:clamp(56px,7vw,96px) clamp(16px,4vw,40px)">
	<div style="max-width:1280px;margin:0 auto">
		<div data-reveal style="display:flex;flex-wrap:wrap;align-items:flex-end;justify-content:space-between;gap:18px;margin-bottom:34px">
			<div>
				<div class="evag-eyebrow"><?php esc_html_e( 'Start here', 'evag' ); ?></div>
				<h2 style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:clamp(30px,4.2vw,52px);line-height:1;text-transform:uppercase;margin:0"><?php esc_html_e( 'What glass is damaged?', 'evag' ); ?></h2>
			</div>
			<p style="max-width:380px;color:#A6ADB5;font-size:15px;line-height:1.5;margin:0"><?php esc_html_e( 'Tap your damage type — it pre-fills your quote so we can get the right glass moving fast.', 'evag' ); ?></p>
		</div>

		<div role="group" aria-label="<?php esc_attr_e( 'What glass is damaged?', 'evag' ); ?>" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(140px,1fr));gap:10px">
			<style>
				@media (min-width: 1200px) {
					[role="group"][aria-label*="glass"] {
						grid-template-columns: repeat(5, 1fr) !important;
					}
				}
			</style>
			<?php foreach ( $evag['glass_options'] as $i => $g ) : ?>
				<button type="button"
				        data-reveal
				        data-glass-select
				        data-glass-value="<?php echo esc_attr( $g['value'] ); ?>"
				        aria-pressed="false"
				        style="--reveal-delay:<?php echo (int) ( $i * 40 ); ?>ms;position:relative;text-align:left;background:#15171B;border:1px solid rgba(255,255,255,.1);border-radius:4px;padding:18px 14px;min-height:88px;display:flex;align-items:flex-end;cursor:pointer;color:#fff">
					<span data-active-frame hidden style="position:absolute;inset:0;border:2px solid #E01627;border-radius:4px;pointer-events:none"></span>
					<span data-active-tick hidden aria-hidden="true" style="position:absolute;top:12px;right:12px;width:20px;height:20px;border-radius:50%;background:#E01627;color:#fff;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700">✓</span>
					<span style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:clamp(18px,1.5vw,21px);line-height:1.04;text-transform:uppercase;color:#fff;text-wrap:balance"><?php echo esc_html( $g['label'] ); ?></span>
				</button>
			<?php endforeach; ?>
		</div>
	</div>
</section>
