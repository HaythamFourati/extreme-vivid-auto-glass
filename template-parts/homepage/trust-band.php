<?php
/**
 * Trust band — single red horizontal strip with proof points.
 *
 * @package evag
 */
$evag = evag_config();
?>

<section style="background:#E01627;padding:22px clamp(16px,4vw,40px)">
	<div data-reveal style="max-width:1280px;margin:0 auto;display:flex;flex-wrap:wrap;justify-content:center;gap:14px 34px">
		<span style="display:flex;align-items:center;gap:9px;color:#fff;font-size:14.5px;font-weight:500"><span style="font-family:'Saira Condensed',sans-serif;font-weight:800;font-size:17px">★★★★★ 5.0</span> · <?php printf( esc_html__( '%d Google reviews', 'evag' ), (int) $evag['reviews_count'] ); ?></span>
		<?php
		$points = array(
			__( 'Mobile service at home or work', 'evag' ),
			__( 'Baltimore & surrounding counties', 'evag' ),
			__( 'Safety-first installations', 'evag' ),
			__( 'ADAS recalibration available', 'evag' ),
		);
		foreach ( $points as $p ) :
			?>
			<span style="display:flex;align-items:center;gap:9px;color:#FFE3E5;font-size:14.5px;font-weight:500"><span aria-hidden="true" style="width:5px;height:5px;border-radius:50%;background:#fff"></span><?php echo esc_html( $p ); ?></span>
		<?php endforeach; ?>
	</div>
</section>
