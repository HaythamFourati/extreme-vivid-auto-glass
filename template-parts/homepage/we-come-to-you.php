<?php
/**
 * "You don't drive to us — we drive to your glass" — split section with van photo.
 *
 * @package evag
 */
$evag = evag_config();
?>

<section style="background:#0C0D0F;padding:clamp(64px,9vw,120px) clamp(16px,4vw,40px);position:relative;overflow:hidden">
	<div aria-hidden="true" style="position:absolute;inset:0;background-image:repeating-linear-gradient(98deg,transparent 0 38px,rgba(255,255,255,.016) 38px 40px);pointer-events:none"></div>
	<div style="position:relative;max-width:1280px;margin:0 auto;display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:clamp(28px,4vw,56px);align-items:center">
		<div data-reveal style="min-width:0">
			<div class="evag-eyebrow"><?php esc_html_e( 'The shop comes to you', 'evag' ); ?></div>
			<h2 style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:clamp(30px,4.2vw,52px);line-height:1.02;text-transform:uppercase;margin:0 0 18px"><?php esc_html_e( "You don't drive to us.", 'evag' ); ?><br><?php esc_html_e( 'We drive to your glass.', 'evag' ); ?></h2>
			<p style="color:#C2C7CD;font-size:16px;line-height:1.6;max-width:520px;margin:0 0 26px;text-wrap:pretty"><?php esc_html_e( 'No sitting in a waiting room. Our fully-equipped van meets you wherever your vehicle is safely parked — and you keep your day moving.', 'evag' ); ?></p>
			<div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;max-width:520px">
				<?php
				$places = array(
					__( 'Your home driveway', 'evag' ),
					__( 'Your workplace lot', 'evag' ),
					__( 'A parking lot or garage', 'evag' ),
					__( "Wherever it's safely parked", 'evag' ),
				);
				foreach ( $places as $place ) :
					?>
					<div style="display:flex;align-items:center;gap:11px;background:#15171B;border:1px solid rgba(255,255,255,.09);border-radius:4px;padding:13px 15px">
						<span aria-hidden="true" style="width:6px;height:6px;background:#E01627;flex:none"></span>
						<span style="font-size:14.5px;color:#D4D8DD"><?php echo esc_html( $place ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div data-reveal style="--reveal-delay:140ms;min-width:0;position:relative;border-radius:4px;overflow:hidden;clip-path:polygon(0 0,100% 0,94% 100%,0 100%);box-shadow:0 40px 80px -30px rgba(0,0,0,.8)">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/pictures/right-side.jpg' ); ?>" alt="<?php esc_attr_e( 'Extreme Vivid Auto Glass van arriving for mobile service', 'evag' ); ?>" loading="lazy" decoding="async" width="1024" height="514" style="width:100%;height:clamp(300px,30vw,420px);object-fit:cover;display:block">
			<div aria-hidden="true" style="position:absolute;inset:0;background:linear-gradient(180deg,rgba(12,13,15,0) 55%,rgba(12,13,15,.5))"></div>
		</div>
	</div>
</section>
