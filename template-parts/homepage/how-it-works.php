<?php
/**
 * Full "from cracked to cleared in five steps" process strip.
 *
 * @package evag
 */
$steps = array(
	array( '01', __( 'Call or request a quote', 'evag' ), __( 'Reach us by phone or send the quote form — whichever is faster for you.', 'evag' ) ),
	array( '02', __( 'Share details & damage', 'evag' ),  __( 'Tell us the vehicle and which glass is damaged so we match the right part.', 'evag' ) ),
	array( '03', __( 'Choose time & place', 'evag' ),     __( 'Pick a window and a location that works — home, work or anywhere safe.', 'evag' ) ),
	array( '04', __( 'Technician arrives prepared', 'evag' ), __( 'We show up with the glass and tools ready — no second trip needed for most jobs.', 'evag' ) ),
	array( '05', __( 'Repaired, cleaned & checked', 'evag' ), __( 'Glass set, debris cleaned up, safety checked — and recalibrated if your vehicle needs it.', 'evag' ) ),
);
?>

<section style="background:#15171B;border-top:1px solid rgba(255,255,255,.07);padding:clamp(64px,9vw,120px) clamp(16px,4vw,40px)">
	<div style="max-width:1280px;margin:0 auto">
		<div data-reveal style="margin-bottom:44px;max-width:680px">
			<div class="evag-eyebrow"><?php esc_html_e( 'The process', 'evag' ); ?></div>
			<h2 style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:clamp(30px,4.2vw,52px);line-height:1.02;text-transform:uppercase;margin:0"><?php esc_html_e( 'From cracked to cleared in five steps', 'evag' ); ?></h2>
		</div>
		<div style="position:relative;display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:14px">
			<div class="evag-hiw-rail" aria-hidden="true"></div>
			<?php foreach ( $steps as $i => $step ) : list( $num, $title, $body ) = $step; ?>
				<div data-reveal style="--reveal-delay:<?php echo (int) ( $i * 90 ); ?>ms;position:relative;background:#0F1115;border:1px solid rgba(255,255,255,.09);border-top:3px solid #E01627;border-radius:4px;padding:24px 22px">
					<div aria-hidden="true" style="font-family:'Saira Condensed',sans-serif;font-weight:800;font-size:40px;color:#E01627;line-height:.9;margin-bottom:14px"><?php echo esc_html( $num ); ?></div>
					<h3 style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:19px;text-transform:uppercase;margin:0 0 8px"><?php echo esc_html( $title ); ?></h3>
					<p style="font-size:14.5px;color:#A6ADB5;line-height:1.55;margin:0"><?php echo esc_html( $body ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
