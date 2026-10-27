<?php
/**
 * Services grid, mix of real photography and pattern headers.
 *
 * @package evag
 */
?>

<section id="services" style="background:#F5F6F8;color:#14161A;padding:clamp(64px,9vw,120px) clamp(16px,4vw,40px)">
	<div style="max-width:1280px;margin:0 auto">
		<div data-reveal style="max-width:680px;margin-bottom:44px">
			<div class="evag-eyebrow evag-eyebrow--ink"><?php esc_html_e( 'Auto glass services', 'evag' ); ?></div>
			<h2 style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:clamp(30px,4.2vw,52px);line-height:1.02;text-transform:uppercase;margin:0"><?php esc_html_e( 'Windshield replacement, repair & every kind of vehicle glass', 'evag' ); ?></h2>
		</div>

		<?php
		$pattern_dark = "height:172px;position:relative;background:#15171B;background-image:repeating-linear-gradient(115deg,rgba(255,255,255,.045) 0 2px,transparent 2px 22px);display:flex;align-items:flex-end;padding:14px";
		$pattern_adas = "height:172px;position:relative;background:#0F1115;background-image:repeating-linear-gradient(115deg,rgba(95,177,212,.10) 0 2px,transparent 2px 22px);display:flex;align-items:flex-end;justify-content:space-between;padding:14px";

		$services = array_values( evag_services() );
		?>

		<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(290px,1fr));gap:16px">
			<?php foreach ( $services as $i => $s ) :
				$url = evag_service_url( $s['slug'] );
				?>
				<a data-reveal class="evag-svc-card" href="<?php echo esc_url( $url ); ?>" style="--reveal-delay:<?php echo (int) ( $i * 60 ); ?>ms;background:#fff;border:1px solid #E4E7EB;border-radius:4px;overflow:hidden;display:flex;flex-direction:column;text-decoration:none;color:inherit">
					<?php if ( 'photo' === $s['card_type'] ) : ?>
						<div style="height:172px;overflow:hidden;position:relative">
							<img src="<?php echo esc_url( $s['image'] ); ?>" alt="<?php echo esc_attr( $s['image_alt'] ); ?>" loading="lazy" decoding="async" style="width:100%;height:100%;object-fit:cover<?php echo isset( $s['object_pos'] ) ? ';object-position:' . esc_attr( $s['object_pos'] ) : ''; ?>;display:block">
						</div>
					<?php elseif ( 'adas' === $s['card_type'] ) : ?>
						<div style="<?php echo esc_attr( $pattern_adas ); ?>">
							<span style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.18em;color:#5FB1D4;text-transform:uppercase"><?php esc_html_e( 'Camera + sensor calibration', 'evag' ); ?></span>
							<span style="font-family:'Saira Condensed',sans-serif;font-weight:800;font-size:30px;color:rgba(95,177,212,.25);line-height:1">ADAS</span>
						</div>
					<?php else : /* pattern */ ?>
						<div style="<?php echo esc_attr( $pattern_dark ); ?>">
							<span style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.18em;color:#5FB1D4;text-transform:uppercase"><?php echo esc_html( ! empty( $s['pattern_header'] ) ? $s['pattern_header'] : $s['kicker'] ); ?></span>
						</div>
					<?php endif; ?>

					<div style="padding:22px 22px 24px;display:flex;flex-direction:column;flex:1">
						<span style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.16em;text-transform:uppercase;color:#1E7FA6;margin-bottom:8px"><?php echo esc_html( $s['kicker'] ); ?></span>
						<h3 style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:24px;text-transform:uppercase;line-height:1;margin:0 0 9px"><?php echo esc_html( $s['title'] ); ?></h3>
						<p style="font-size:14.5px;color:#454A50;line-height:1.55;flex:1;margin:0"><?php echo esc_html( $s['short'] ); ?></p>
						<span style="margin-top:16px;align-self:flex-start;color:#E01627;font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:16px;text-transform:uppercase;letter-spacing:.04em"><?php esc_html_e( 'Learn more →', 'evag' ); ?></span>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
