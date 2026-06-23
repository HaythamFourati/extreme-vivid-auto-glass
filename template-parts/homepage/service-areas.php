<?php
/**
 * Service areas — Maryland-only route strip.
 *
 * @package evag
 */
$zones = array(
	array( 'ZONE 01', __( 'Baltimore County', 'evag' ) ),
	array( 'ZONE 02', __( 'Anne Arundel County', 'evag' ) ),
	array( 'ZONE 03', __( 'Carroll County', 'evag' ) ),
	array( 'ZONE 04', __( 'Harford County', 'evag' ) ),
);
?>

<section id="areas" style="background:#0C0D0F;padding:clamp(64px,9vw,120px) clamp(16px,4vw,40px);position:relative;overflow:hidden">
	<div aria-hidden="true" style="position:absolute;inset:0;background-image:repeating-linear-gradient(98deg,transparent 0 38px,rgba(255,255,255,.016) 38px 40px);pointer-events:none"></div>
	<div style="position:relative;max-width:1280px;margin:0 auto">
		<div data-reveal style="max-width:680px;margin-bottom:40px">
			<div class="evag-eyebrow"><?php esc_html_e( 'Service areas', 'evag' ); ?></div>
			<h2 style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:clamp(30px,4.2vw,52px);line-height:1.02;text-transform:uppercase;margin:0"><?php esc_html_e( 'Mobile auto glass service across Maryland', 'evag' ); ?></h2>
		</div>

		<div data-reveal style="--reveal-delay:100ms;background:#15171B;border:1px solid rgba(255,255,255,.09);border-radius:4px;padding:30px clamp(18px,3vw,34px)">
			<div style="display:flex;align-items:center;gap:8px;margin-bottom:24px">
				<span style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.18em;color:#5FB1D4;text-transform:uppercase"><?php esc_html_e( 'Service route · MD', 'evag' ); ?></span>
				<span aria-hidden="true" style="flex:1;height:1px;background:repeating-linear-gradient(90deg,rgba(255,255,255,.3) 0 8px,transparent 8px 16px)"></span>
			</div>
			<div style="display:flex;flex-wrap:wrap;gap:12px">
				<?php foreach ( $zones as $i => $z ) : list( $code, $name ) = $z; ?>
					<div data-reveal style="--reveal-delay:<?php echo (int) ( 140 + $i * 60 ); ?>ms;flex:1;min-width:150px;border:1px solid rgba(255,255,255,.1);border-top:2px solid #E01627;border-radius:4px;padding:16px">
						<span style="font-family:'IBM Plex Mono',monospace;font-size:10px;letter-spacing:.14em;color:#7E858E"><?php echo esc_html( $code ); ?></span>
						<div style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:21px;text-transform:uppercase;margin-top:6px"><?php echo esc_html( $name ); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
			<div style="display:flex;flex-wrap:wrap;gap:9px;margin-top:18px;align-items:center">
				<span style="font-family:'IBM Plex Mono',monospace;font-size:11px;color:#7E858E;letter-spacing:.1em"><?php esc_html_e( 'Also serving:', 'evag' ); ?></span>
				<?php foreach ( array( __( 'Baltimore', 'evag' ), __( 'Reisterstown', 'evag' ), __( '& surrounding areas', 'evag' ) ) as $also ) : ?>
					<span style="font-size:13.5px;color:#D4D8DD;border:1px solid rgba(255,255,255,.16);border-radius:3px;padding:6px 12px"><?php echo esc_html( $also ); ?></span>
				<?php endforeach; ?>
			</div>
		</div>
		<p style="margin-top:18px;color:#A6ADB5;font-size:15px;max-width:640px"><?php esc_html_e( "Not sure if you're in range?", 'evag' ); ?> <a href="#quote" data-scroll-to="quote" style="background:none;border:none;color:#5FB1D4;font-size:15px;font-weight:600;text-decoration:underline;text-underline-offset:3px"><?php esc_html_e( 'Send your ZIP in a quote', 'evag' ); ?></a> <?php esc_html_e( "and we'll confirm availability.", 'evag' ); ?></p>
	</div>
</section>
