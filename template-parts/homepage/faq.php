<?php
/**
 * FAQ — native <details> accordion (no JS).
 *
 * @package evag
 */
$faqs = evag_faqs();
?>

<section style="background:#0C0D0F;padding:clamp(64px,9vw,120px) clamp(16px,4vw,40px)">
	<div style="max-width:920px;margin:0 auto">
		<div data-reveal style="margin-bottom:36px">
			<div class="evag-eyebrow"><?php esc_html_e( 'FAQ', 'evag' ); ?></div>
			<h2 style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:clamp(30px,4.2vw,52px);line-height:1.02;text-transform:uppercase;margin:0"><?php esc_html_e( 'Common questions', 'evag' ); ?></h2>
		</div>
		<div style="display:flex;flex-direction:column;gap:10px">
			<?php foreach ( $faqs as $i => $faq ) : list( $q, $a ) = $faq; ?>
				<details data-faq data-reveal style="--reveal-delay:<?php echo (int) ( $i * 35 ); ?>ms;background:#15171B;border:1px solid rgba(255,255,255,.09);border-radius:4px">
					<summary style="display:flex;justify-content:space-between;align-items:center;gap:16px;padding:20px 22px;cursor:pointer;font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:19px;text-transform:uppercase;list-style:none"><?php echo esc_html( $q ); ?><span class="evag-chev" aria-hidden="true" style="color:#E01627;font-size:24px;line-height:1">+</span></summary>
					<p style="padding:0 22px 22px;color:#A6ADB5;font-size:15px;line-height:1.6;margin:0;text-wrap:pretty"><?php echo esc_html( $a ); ?></p>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>
