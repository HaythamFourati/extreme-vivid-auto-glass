<?php
/**
 * Insurance + ADAS twin-card row on the light surface.
 *
 * @package evag
 */
?>

<section style="background:#F5F6F8;color:#14161A;padding:clamp(64px,9vw,120px) clamp(16px,4vw,40px)">
	<div style="max-width:1280px;margin:0 auto;display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:16px">
		<div data-reveal class="evag-lift" style="background:#fff;border:1px solid #E4E7EB;border-radius:4px;padding:34px 32px">
			<div class="evag-eyebrow evag-eyebrow--ink"><?php esc_html_e( 'Insurance', 'evag' ); ?></div>
			<h3 style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:clamp(24px,2.6vw,32px);text-transform:uppercase;line-height:1.02;margin:0 0 14px"><?php esc_html_e( "We'll help you work with your coverage", 'evag' ); ?></h3>
			<p style="font-size:15.5px;color:#454A50;line-height:1.6;margin:0 0 14px;text-wrap:pretty"><?php esc_html_e( "Many comprehensive auto policies may cover windshield repair or replacement. Coverage and deductibles vary, so we'll walk you through what to check and confirm pricing before any work begins.", 'evag' ); ?></p>
			<p style="font-size:13px;color:#6C7178;line-height:1.5;margin:0"><?php esc_html_e( "We can't guarantee what your specific policy covers — but we make the process clear and easy.", 'evag' ); ?></p>
		</div>
		<div data-reveal class="evag-lift" style="--reveal-delay:120ms;background:#0C0D0F;color:#fff;border-radius:4px;padding:34px 32px;position:relative;overflow:hidden">
			<div aria-hidden="true" style="position:absolute;inset:0;background-image:repeating-linear-gradient(115deg,rgba(95,177,212,.05) 0 2px,transparent 2px 26px);pointer-events:none"></div>
			<div style="position:relative">
				<div class="evag-eyebrow"><?php esc_html_e( 'ADAS recalibration', 'evag' ); ?></div>
				<h3 style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:clamp(24px,2.6vw,32px);text-transform:uppercase;line-height:1.02;margin:0 0 14px"><?php esc_html_e( 'New windshield? Your cameras may need recalibration', 'evag' ); ?></h3>
				<p style="font-size:15.5px;color:#C2C7CD;line-height:1.6;margin:0 0 14px;text-wrap:pretty"><?php esc_html_e( 'Many newer vehicles have cameras and sensors mounted at the windshield for lane-keeping, automatic braking and more. After a replacement, those systems often need to be recalibrated to read the road accurately.', 'evag' ); ?></p>
				<p style="font-size:13px;color:#9097A0;line-height:1.5;margin:0"><?php esc_html_e( 'We handle recalibration as part of the job so your driver-assist features work as intended.', 'evag' ); ?></p>
			</div>
		</div>
	</div>
</section>
