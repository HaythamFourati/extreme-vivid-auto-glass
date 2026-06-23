<?php
/**
 * Quote form — main conversion surface powered by Contact Form 7.
 *
 * @package evag
 */
$evag = evag_config();
?>

<section id="quote" style="background:#F5F6F8;color:#14161A;padding:clamp(64px,9vw,120px) clamp(16px,4vw,40px)">
	<div style="max-width:1180px;margin:0 auto">
		<div data-reveal style="max-width:680px;margin-bottom:36px">
			<div class="evag-eyebrow evag-eyebrow--ink"><?php esc_html_e( 'Request a quote', 'evag' ); ?></div>
			<h2 style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:clamp(30px,4.2vw,52px);line-height:1.02;text-transform:uppercase;margin:0"><?php esc_html_e( 'Get your auto glass quote', 'evag' ); ?></h2>
		</div>

		<div style="display:flex;flex-wrap:wrap;gap:18px;align-items:flex-start">
			<div data-reveal style="flex:1.6 1 360px;min-width:0;background:#fff;border:1px solid #E4E7EB;border-radius:4px;padding:clamp(22px,3vw,36px)">

				<div data-quote-success hidden style="text-align:center;padding:30px 10px">
					<div aria-hidden="true" style="width:56px;height:56px;border-radius:50%;background:#E01627;color:#fff;display:flex;align-items:center;justify-content:center;font-size:28px;margin:0 auto 18px">✓</div>
					<h3 style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:30px;text-transform:uppercase;margin:0 0 10px"><?php esc_html_e( 'Quote request received', 'evag' ); ?></h3>
					<p style="font-size:15.5px;color:#54595F;line-height:1.6;max-width:420px;margin:0 auto 22px"><?php esc_html_e( 'Thanks', 'evag' ); ?><span data-quote-thanks-name></span> — <?php esc_html_e( "we'll confirm availability and pricing before any service. Need it sooner? Call us now.", 'evag' ); ?></p>
					<a href="tel:<?php echo esc_attr( $evag['phone_tel_href'] ); ?>" style="display:inline-flex;align-items:center;gap:10px;background:#0C0D0F;color:#fff;font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:18px;letter-spacing:.04em;text-transform:uppercase;padding:15px 28px;border-radius:4px;text-decoration:none"><?php /* translators: %s phone */ printf( esc_html__( 'Call %s', 'evag' ), esc_html( $evag['phone_display'] ) ); ?></a>
				</div>

				<div data-cf7-quote>
					<?php
					$quote_form = function_exists( 'wpcf7_get_contact_form_by_title' )
						? wpcf7_get_contact_form_by_title( EVAG_QUOTE_FORM_TITLE )
						: null;

					if ( $quote_form ) {
						echo do_shortcode(
							sprintf(
								'[contact-form-7 title="%s" html_title="Request an auto glass quote" html_class="evag-cf7-form"]',
								esc_attr( EVAG_QUOTE_FORM_TITLE )
							)
						);
					} else {
						?>
						<div class="evag-quote-unavailable" role="status">
							<h3><?php esc_html_e( 'Online quote form unavailable', 'evag' ); ?></h3>
							<p><?php esc_html_e( 'Please call us and we’ll help with your auto glass quote.', 'evag' ); ?></p>
							<a href="tel:<?php echo esc_attr( $evag['phone_tel_href'] ); ?>"><?php echo esc_html( $evag['phone_display'] ); ?></a>
						</div>
						<?php
					}
					?>
				</div>
			</div>

			<aside data-reveal style="--reveal-delay:120ms;flex:1 1 280px;min-width:0;background:#0C0D0F;color:#fff;border-radius:4px;padding:30px 28px;position:relative;overflow:hidden">
				<div aria-hidden="true" style="position:absolute;inset:0;background-image:repeating-linear-gradient(115deg,rgba(95,177,212,.05) 0 2px,transparent 2px 26px);pointer-events:none"></div>
				<div style="position:relative">
					<div style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.18em;text-transform:uppercase;color:#5FB1D4;margin-bottom:18px"><?php esc_html_e( 'No-pressure quote', 'evag' ); ?></div>
					<div style="display:flex;flex-direction:column;gap:18px">
						<?php
						$assurances = array(
							__( "We'll confirm availability and pricing before any service — no surprises.", 'evag' ),
							__( 'No shop visit required for many services — we come to your home or work.', 'evag' ),
							__( 'Have your VIN ready for faster, more accurate glass matching.', 'evag' ),
						);
						foreach ( $assurances as $a ) :
							?>
							<div style="display:flex;gap:12px">
								<span style="font-family:'Saira Condensed',sans-serif;font-weight:800;color:#E01627;font-size:18px;line-height:1.2">→</span>
								<p style="font-size:14.5px;color:#C2C7CD;line-height:1.5;margin:0"><?php echo esc_html( $a ); ?></p>
							</div>
						<?php endforeach; ?>
					</div>
					<div aria-hidden="true" style="height:1px;background:rgba(255,255,255,.1);margin:24px 0"></div>
					<div style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.1em;color:#7E858E;margin-bottom:6px"><?php esc_html_e( 'HOURS', 'evag' ); ?></div>
					<p style="font-size:14.5px;color:#D4D8DD;line-height:1.6;margin:0"><?php esc_html_e( 'Mon–Fri · 8AM–5PM', 'evag' ); ?><br><?php esc_html_e( 'Sat–Sun · Closed', 'evag' ); ?></p>
				</div>
			</aside>
		</div>
	</div>
</section>
