<?php
/**
 * Final call-to-action — red full-bleed band.
 *
 * @package evag
 */
$evag = evag_config();
?>

<section style="background:#E01627;padding:clamp(56px,8vw,104px) clamp(16px,4vw,40px);position:relative;overflow:hidden">
	<div aria-hidden="true" style="position:absolute;inset:0;background-image:repeating-linear-gradient(115deg,rgba(255,255,255,.06) 0 2px,transparent 2px 30px);pointer-events:none"></div>
	<div style="position:relative;max-width:920px;margin:0 auto;text-align:center">
		<h2 data-reveal style="font-family:'Saira Condensed',sans-serif;font-weight:800;font-size:clamp(36px,6vw,72px);line-height:.96;text-transform:uppercase;color:#fff;margin:0 0 16px;text-wrap:balance"><?php esc_html_e( 'Need auto glass help today?', 'evag' ); ?></h2>
		<p data-reveal style="--reveal-delay:100ms;color:#FFE0E3;font-size:clamp(16px,1.8vw,19px);line-height:1.55;max-width:620px;margin:0 auto 30px"><?php esc_html_e( "Call Extreme Vivid Auto Glass or request a quote and we'll help you get back on the road safely.", 'evag' ); ?></p>
		<div data-reveal style="--reveal-delay:200ms;display:flex;flex-wrap:wrap;gap:14px;justify-content:center">
			<a href="<?php echo esc_url( home_url( '/#quote' ) ); ?>" data-scroll-to="quote" style="display:inline-flex;align-items:center;gap:10px;background:#0C0D0F;color:#fff;font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:clamp(16px,1.6vw,20px);letter-spacing:.04em;text-transform:uppercase;padding:18px 32px;border:none;border-radius:4px;text-decoration:none;transition:transform .15s"><?php esc_html_e( 'Request a Quote →', 'evag' ); ?></a>
			<a href="tel:<?php echo esc_attr( $evag['phone_tel_href'] ); ?>" style="display:inline-flex;align-items:center;gap:10px;background:#fff;color:#0C0D0F;font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:clamp(16px,1.6vw,20px);letter-spacing:.04em;text-transform:uppercase;padding:18px 32px;border-radius:4px;text-decoration:none;transition:transform .15s"><?php /* translators: %s phone */ printf( esc_html__( 'Call %s', 'evag' ), esc_html( $evag['phone_display'] ) ); ?></a>
		</div>
	</div>
</section>
