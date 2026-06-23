<?php
/**
 * Hero — primary above-the-fold panel with angled image, sheen, and "how it works" mini card.
 *
 * @package evag
 */
$evag = evag_config();
?>

<section style="position:relative;padding:calc(70px + clamp(40px,7vw,86px)) clamp(16px,4vw,40px) clamp(56px,7vw,96px);overflow:hidden;background:radial-gradient(120% 90% at 80% -10%,#1A1D22 0%,#0C0D0F 60%)">
	<div aria-hidden="true" style="position:absolute;inset:0;background-image:repeating-linear-gradient(98deg,transparent 0 38px,rgba(255,255,255,.018) 38px 40px);pointer-events:none"></div>
	<div aria-hidden="true" class="evag-hero-orb" style="position:absolute;top:-10%;right:-6%;width:520px;height:520px;background:radial-gradient(circle,rgba(95,177,212,.10),transparent 70%);pointer-events:none"></div>

	<div style="position:relative;max-width:1280px;margin:0 auto;display:flex;flex-wrap:wrap;gap:clamp(32px,5vw,72px);align-items:center">
		<div style="flex:1.05 1 420px;min-width:0">
			<div data-reveal class="evag-hero-eyebrow" style="display:inline-flex;align-items:center;gap:10px;font-family:'IBM Plex Mono',monospace;font-size:12px;letter-spacing:.2em;text-transform:uppercase;color:#5FB1D4">
				<span aria-hidden="true" style="width:7px;height:7px;border-radius:50%;background:#5FB1D4;animation:evSheen-pulse 2.4s ease infinite"></span>
				<?php esc_html_e( 'Mobile Auto Glass · Baltimore since 2003', 'evag' ); ?>
			</div>
			<h1 data-reveal class="evag-hero-h1" style="font-family:'Saira Condensed',sans-serif;font-weight:800;font-size:clamp(46px,7.2vw,88px);line-height:.93;text-transform:uppercase;letter-spacing:.004em;margin:18px 0 0;text-wrap:balance">
				<?php esc_html_e( 'Cracked windshield?', 'evag' ); ?><br>
				<span style="color:#fff"><?php esc_html_e( 'We come to', 'evag' ); ?></span>
				<span style="position:relative;color:#fff;white-space:nowrap"><?php esc_html_e( 'you.', 'evag' ); ?><span aria-hidden="true" style="position:absolute;left:0;right:0;bottom:6px;height:8px;background:#E01627;z-index:-1"></span></span>
			</h1>
			<p data-reveal class="evag-hero-lede" style="margin-top:22px;max-width:560px;font-size:clamp(15.5px,1.6vw,18.5px);line-height:1.55;color:#C2C7CD;text-wrap:pretty"><?php esc_html_e( 'Professional mobile auto glass repair and replacement across Baltimore, Anne Arundel, Carroll and Harford counties — windshields, door glass, side windows and ADAS-equipped glass.', 'evag' ); ?></p>

			<div data-reveal class="evag-hero-chips" style="display:flex;flex-wrap:wrap;gap:9px;margin-top:26px">
				<?php
				$chips = array(
					__( 'Since 2003', 'evag' ),
					sprintf( '★ 5.0 · %d Reviews', $evag['reviews_count'] ),
					__( 'Mobile Service', 'evag' ),
					__( 'ADAS Recalibration', 'evag' ),
					__( 'Lifetime Warranty', 'evag' ),
					__( 'Insurance-Friendly', 'evag' ),
				);
				foreach ( $chips as $chip ) :
					?>
					<span style="display:inline-flex;align-items:center;gap:8px;font-family:'IBM Plex Mono',monospace;font-size:12px;letter-spacing:.04em;color:#D4D8DD;background:rgba(255,255,255,.02);border:1px solid rgba(255,255,255,.14);border-radius:3px;padding:8px 13px"><span aria-hidden="true" style="width:5px;height:5px;border-radius:50%;background:#5FB1D4;flex:none"></span><?php echo esc_html( $chip ); ?></span>
				<?php endforeach; ?>
			</div>

			<div data-reveal class="evag-hero-ctas" style="display:flex;flex-wrap:wrap;gap:14px;margin-top:30px">
				<a href="<?php echo esc_url( home_url( '/#quote' ) ); ?>" data-scroll-to="quote" style="display:inline-flex;align-items:center;justify-content:center;gap:10px;background:#E01627;color:#fff;font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:clamp(16px,1.5vw,19px);letter-spacing:.04em;text-transform:uppercase;padding:17px 30px;border:none;border-radius:4px;text-decoration:none;box-shadow:0 14px 30px -12px rgba(224,22,39,.8)"><?php esc_html_e( 'Request a Quote →', 'evag' ); ?></a>
				<a href="tel:<?php echo esc_attr( $evag['phone_tel_href'] ); ?>" style="display:inline-flex;align-items:center;justify-content:center;gap:10px;background:transparent;color:#fff;font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:clamp(16px,1.5vw,19px);letter-spacing:.04em;text-transform:uppercase;padding:16px 28px;border:1px solid rgba(255,255,255,.3);border-radius:4px;text-decoration:none;transition:border-color .15s,background .15s"><?php /* translators: %s phone */ printf( esc_html__( 'Call %s', 'evag' ), esc_html( $evag['phone_display'] ) ); ?></a>
			</div>
		</div>

		<div style="flex:1 1 380px;position:relative;min-width:0">
			<div data-reveal class="evag-hero-panel" style="position:relative;border-radius:4px;overflow:hidden;clip-path:polygon(6% 0,100% 0,100% 100%,0 100%);box-shadow:0 48px 90px -34px rgba(0,0,0,.85),inset 0 0 0 1px rgba(95,177,212,.14);aspect-ratio:5/4">
				<img src="<?php echo esc_url( $evag['hero_image'] ); ?>" alt="<?php esc_attr_e( 'Extreme Vivid Auto Glass branded mobile service van parked at a job site', 'evag' ); ?>" width="1200" height="960" loading="eager" decoding="async" fetchpriority="high" style="width:100%;height:100%;object-fit:cover;filter:contrast(1.05) saturate(1.05);display:block">
				<div aria-hidden="true" style="position:absolute;inset:0;background:linear-gradient(180deg,rgba(12,13,15,0) 40%,rgba(12,13,15,.55) 100%)"></div>
				<div aria-hidden="true" style="position:absolute;top:0;bottom:0;left:0;width:55%;background:linear-gradient(90deg,transparent,rgba(255,255,255,.16),transparent);animation:evSheen 7s ease-in-out infinite;pointer-events:none"></div>
				<span style="position:absolute;left:7%;top:18px;display:inline-flex;align-items:center;gap:10px;font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.2em;color:rgba(255,255,255,.9);text-transform:uppercase"><span aria-hidden="true" style="width:22px;height:2px;background:#E01627;transform:skewX(-22deg);flex:none"></span><?php esc_html_e( 'The shop comes to you', 'evag' ); ?></span>
			</div>

			<div data-reveal class="evag-hero-card" style="position:relative;margin-top:-44px;margin-left:auto;width:min(94%,420px);background:#15171B;border:1px solid rgba(255,255,255,.1);border-radius:4px;padding:22px 24px;box-shadow:0 30px 60px -24px rgba(0,0,0,.8)">
				<div style="display:flex;align-items:center;gap:9px;margin-bottom:16px">
					<span aria-hidden="true" style="width:22px;height:2px;background:#E01627;transform:skewX(-22deg)"></span>
					<span style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.2em;color:#fff;text-transform:uppercase"><?php esc_html_e( 'How it works', 'evag' ); ?></span>
				</div>
				<ol style="display:grid;grid-template-columns:1fr 1fr;gap:14px 18px;list-style:none;margin:0;padding:0">
					<?php
					$steps = array(
						'01' => __( 'Send vehicle details', 'evag' ),
						'02' => __( 'Pick your location', 'evag' ),
						'03' => __( 'We come to you', 'evag' ),
						'04' => __( 'Back on the road', 'evag' ),
					);
					foreach ( $steps as $num => $label ) :
						?>
						<li style="display:flex;gap:10px">
							<span aria-hidden="true" style="font-family:'Saira Condensed',sans-serif;font-weight:800;font-size:20px;color:#E01627;line-height:1"><?php echo esc_html( $num ); ?></span>
							<span style="font-size:13.5px;color:#C2C7CD;line-height:1.35"><?php echo esc_html( $label ); ?></span>
						</li>
					<?php endforeach; ?>
				</ol>
			</div>
		</div>
	</div>
</section>
