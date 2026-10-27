<?php
/**
 * Site footer + mobile bottom bar + wp_footer.
 *
 * @package evag
 */
$evag = evag_config();
?>

<footer id="contact" style="background:#0A0B0C;border-top:1px solid rgba(255,255,255,.07);padding:clamp(48px,6vw,76px) clamp(16px,4vw,40px) 40px">
	<div style="max-width:1280px;margin:0 auto;display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:36px 24px">
		<div style="grid-column:1/-1;max-width:340px">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Extreme Vivid Auto Glass homepage', 'evag' ); ?>" style="display:flex;align-items:center;gap:12px;margin-bottom:16px;text-decoration:none;color:#fff">
				<span style="width:40px;height:40px;background:#E01627;clip-path:polygon(20% 0,100% 0,80% 100%,0 100%);display:flex;align-items:center;justify-content:center;font-family:'Saira Condensed',sans-serif;font-weight:800;font-size:19px;color:#fff">EV</span>
				<span style="line-height:1">
					<span style="display:block;font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:18px;letter-spacing:.06em">EXTREME VIVID</span>
					<span style="display:block;font-family:'IBM Plex Mono',monospace;font-size:9.5px;letter-spacing:.34em;color:#5FB1D4;margin-top:2px">AUTO&nbsp;GLASS</span>
				</span>
			</a>
			<p style="color:#7E858E;font-size:14px;line-height:1.6"><?php esc_html_e( 'Replacing broken windshields in Baltimore since 2003. Mobile auto glass repair and replacement that comes to you.', 'evag' ); ?></p>
		</div>

		<div>
			<div style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.16em;text-transform:uppercase;color:#7E858E;margin-bottom:14px"><?php esc_html_e( 'Contact', 'evag' ); ?></div>
			<a href="tel:<?php echo esc_attr( $evag['phone_tel'] ); ?>" style="display:block;font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:24px;color:#fff;margin-bottom:6px"><?php echo esc_html( $evag['phone_display'] ); ?></a>
			<p style="color:#9AA1AB;font-size:14px;line-height:1.7"><?php esc_html_e( 'Mon–Fri · 8AM–5PM', 'evag' ); ?><br><?php esc_html_e( 'Sat–Sun · Closed', 'evag' ); ?></p>
		</div>

		<div>
			<div style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.16em;text-transform:uppercase;color:#7E858E;margin-bottom:14px"><?php esc_html_e( 'Service areas', 'evag' ); ?></div>
			<ul style="list-style:none;color:#9AA1AB;font-size:14px;line-height:2;padding:0;margin:0">
				<?php foreach ( $evag['service_areas'] as $area ) : ?>
					<li><?php echo esc_html( $area ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>

		<div>
			<div style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.16em;text-transform:uppercase;color:#7E858E;margin-bottom:14px"><?php esc_html_e( 'Services', 'evag' ); ?></div>
			<ul style="list-style:none;color:#9AA1AB;font-size:14px;line-height:2;padding:0;margin:0">
				<li><a href="<?php echo esc_url( evag_service_url( 'windshield-replacement' ) ); ?>" style="text-decoration:none"><?php esc_html_e( 'Windshield Replacement', 'evag' ); ?></a></li>
				<li><a href="<?php echo esc_url( evag_service_url( 'windshield-repair' ) ); ?>" style="text-decoration:none"><?php esc_html_e( 'Windshield Repair', 'evag' ); ?></a></li>
				<li><a href="<?php echo esc_url( evag_service_url( 'door-glass-replacement' ) ); ?>" style="text-decoration:none"><?php esc_html_e( 'Door & Side Glass', 'evag' ); ?></a></li>
				<li><a href="<?php echo esc_url( evag_service_url( 'adas-recalibration' ) ); ?>" style="text-decoration:none"><?php esc_html_e( 'ADAS Recalibration', 'evag' ); ?></a></li>
				<li><a href="<?php echo esc_url( evag_service_url( 'rear-windshield-replacement' ) ); ?>" style="text-decoration:none"><?php esc_html_e( 'Rear Back Glass', 'evag' ); ?></a></li>
			</ul>
		</div>

		<div>
			<div style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.16em;text-transform:uppercase;color:#7E858E;margin-bottom:14px"><?php esc_html_e( 'Explore', 'evag' ); ?></div>
			<ul style="list-style:none;color:#9AA1AB;font-size:14px;line-height:2;padding:0;margin:0">
				<li><a href="<?php echo esc_url( evag_blog_url() ); ?>" style="text-decoration:none"><?php esc_html_e( 'Blog', 'evag' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/#work' ) ); ?>" style="text-decoration:none"><?php esc_html_e( 'Recent Work', 'evag' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/#reviews' ) ); ?>" style="text-decoration:none"><?php esc_html_e( 'Reviews', 'evag' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/#areas' ) ); ?>" style="text-decoration:none"><?php esc_html_e( 'Service Areas', 'evag' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/#quote' ) ); ?>" style="text-decoration:none"><?php esc_html_e( 'Request a Quote', 'evag' ); ?></a></li>
			</ul>
		</div>
	</div>
	<div style="max-width:1280px;margin:40px auto 0;padding-top:24px;border-top:1px solid rgba(255,255,255,.07);display:flex;flex-wrap:wrap;gap:12px;justify-content:space-between;align-items:center">
		<span style="color:#5A6068;font-size:12.5px;font-family:'IBM Plex Mono',monospace">&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( $evag['business_name'] ); ?></span>
		<span style="color:#5A6068;font-size:12.5px;font-family:'IBM Plex Mono',monospace"><?php esc_html_e( 'Site by Local Vocal Marketing · Privacy', 'evag' ); ?></span>
	</div>
</footer>

<?php get_template_part( 'template-parts/homepage/mobile-bottom-bar' ); ?>

</div><!-- /.site-wrap -->

<?php wp_footer(); ?>
</body>
</html>
