<?php
/**
 * Sticky site header — desktop nav + mobile hamburger + drawer.
 *
 * Mobile vs desktop visibility is CSS-driven (data attributes flipped via JS for the drawer only).
 *
 * @package evag
 */
$evag = evag_config();
?>

<header data-site-header style="position:fixed;top:0;left:0;right:0;z-index:90;background:rgba(12,13,15,.86);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);border-bottom:1px solid rgba(255,255,255,.09)">
	<div style="max-width:1280px;margin:0 auto;padding:0 clamp(16px,4vw,40px);height:70px;display:flex;align-items:center;justify-content:space-between;gap:20px">

		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Extreme Vivid Auto Glass homepage', 'evag' ); ?>" style="display:flex;align-items:center;gap:12px;text-decoration:none">
			<span style="width:40px;height:40px;background:#E01627;clip-path:polygon(20% 0,100% 0,80% 100%,0 100%);display:flex;align-items:center;justify-content:center;font-family:'Saira Condensed',sans-serif;font-weight:800;font-size:19px;color:#fff;letter-spacing:.02em">EV</span>
			<span style="text-align:left;line-height:1">
				<span style="display:block;font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:18px;letter-spacing:.06em;color:#fff">EXTREME VIVID</span>
				<span style="display:block;font-family:'IBM Plex Mono',monospace;font-size:9.5px;letter-spacing:.34em;color:#5FB1D4;margin-top:2px">AUTO&nbsp;GLASS</span>
			</span>
		</a>

		<nav class="evag-desktop evag-nav" aria-label="<?php esc_attr_e( 'Primary', 'evag' ); ?>" style="display:none;align-items:center;gap:20px">
			<div class="evag-nav-dropdown" style="position:relative">
				<button type="button" data-nav-dropdown aria-haspopup="true" aria-expanded="false" class="evag-nav-link" style="display:inline-flex;align-items:center;gap:6px;background:none;border:none;color:#C7CCD2;font-size:14.5px;font-weight:500;letter-spacing:.01em;font-family:inherit;cursor:pointer;padding:0">
					<?php esc_html_e( 'Services', 'evag' ); ?>
					<svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="evag-nav-chev"><polyline points="6 9 12 15 18 9"></polyline></svg>
				</button>
				<div class="evag-nav-menu" role="menu" aria-label="<?php esc_attr_e( 'Services', 'evag' ); ?>" hidden style="position:absolute;top:calc(100% + 18px);left:-18px;min-width:280px;background:#15171B;border:1px solid rgba(255,255,255,.10);border-radius:6px;padding:10px;box-shadow:0 24px 50px -18px rgba(0,0,0,.55);display:grid;gap:2px">
					<a href="<?php echo esc_url( home_url( '/#services' ) ); ?>" data-scroll-to="services" role="menuitem" style="display:block;padding:10px 12px;color:#C7CCD2;font-family:'IBM Plex Mono',monospace;font-size:10.5px;letter-spacing:.18em;text-transform:uppercase;text-decoration:none;border-bottom:1px solid rgba(255,255,255,.07)"><?php esc_html_e( 'All services', 'evag' ); ?></a>
					<?php foreach ( evag_services() as $slug => $s ) : ?>
						<a href="<?php echo esc_url( evag_service_url( $slug ) ); ?>" role="menuitem" class="evag-nav-menu-item" style="display:block;padding:10px 12px;color:#E7EAEE;font-family:'Saira Condensed',sans-serif;font-weight:600;font-size:15px;letter-spacing:.02em;text-transform:uppercase;text-decoration:none;border-radius:4px"><?php echo esc_html( $s['menu_label'] ); ?></a>
					<?php endforeach; ?>
				</div>
			</div>
			<a href="<?php echo esc_url( home_url( '/#areas' ) ); ?>"    data-scroll-to="areas"    class="evag-nav-link" style="background:none;border:none;color:#C7CCD2;font-size:14.5px;font-weight:500;letter-spacing:.01em;text-decoration:none"><?php esc_html_e( 'Service Areas', 'evag' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/#work' ) ); ?>"     data-scroll-to="work"     class="evag-nav-link" style="background:none;border:none;color:#C7CCD2;font-size:14.5px;font-weight:500;letter-spacing:.01em;text-decoration:none"><?php esc_html_e( 'Recent Work', 'evag' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/#reviews' ) ); ?>"  data-scroll-to="reviews"  class="evag-nav-link" style="background:none;border:none;color:#C7CCD2;font-size:14.5px;font-weight:500;letter-spacing:.01em;text-decoration:none"><?php esc_html_e( 'Reviews', 'evag' ); ?></a>
			<a href="<?php echo esc_url( evag_blog_url() ); ?>" class="evag-nav-link" style="background:none;border:none;color:#C7CCD2;font-size:14.5px;font-weight:500;letter-spacing:.01em;text-decoration:none"><?php esc_html_e( 'Blog', 'evag' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"  data-scroll-to="contact"  class="evag-nav-link" style="background:none;border:none;color:#C7CCD2;font-size:14.5px;font-weight:500;letter-spacing:.01em;text-decoration:none"><?php esc_html_e( 'Contact', 'evag' ); ?></a>
		</nav>

		<div class="evag-desktop" style="display:none;align-items:center;gap:14px">
			<a href="tel:<?php echo esc_attr( $evag['phone_tel_href'] ); ?>" style="display:flex;flex-direction:column;align-items:flex-end;line-height:1.05;text-decoration:none">
				<span style="font-family:'IBM Plex Mono',monospace;font-size:9.5px;letter-spacing:.2em;color:#7E858E"><?php esc_html_e( 'CALL · MON–FRI 8–5', 'evag' ); ?></span>
				<span style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:21px;color:#fff;letter-spacing:.02em"><?php echo esc_html( $evag['phone_display'] ); ?></span>
			</a>
			<a href="<?php echo esc_url( home_url( '/#quote' ) ); ?>" data-scroll-to="quote" style="display:inline-flex;align-items:center;gap:8px;background:#E01627;color:#fff;font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:16px;letter-spacing:.04em;text-transform:uppercase;padding:12px 22px;border:none;border-radius:4px;text-decoration:none;box-shadow:0 10px 24px -12px rgba(224,22,39,.8);transition:transform .15s,box-shadow .15s"><?php esc_html_e( 'Request a Quote', 'evag' ); ?></a>
		</div>

		<button class="evag-mobile" type="button" data-nav-toggle aria-label="<?php esc_attr_e( 'Menu', 'evag' ); ?>" aria-expanded="false" style="display:flex;flex-direction:column;gap:5px;background:none;border:1px solid rgba(255,255,255,.18);border-radius:4px;padding:11px 12px;cursor:pointer">
			<span style="width:20px;height:2px;background:#fff;display:block"></span>
			<span style="width:20px;height:2px;background:#fff;display:block"></span>
			<span style="width:20px;height:2px;background:#fff;display:block"></span>
		</button>
	</div>

	<div data-nav-drawer hidden style="background:#0C0D0F;border-bottom:1px solid rgba(255,255,255,.09);padding:8px clamp(16px,4vw,40px) 22px;display:flex;flex-direction:column;gap:2px">

		<details data-faq style="border-bottom:1px solid rgba(255,255,255,.07)">
			<summary style="list-style:none;display:flex;align-items:center;justify-content:space-between;cursor:pointer;color:#E7EAEE;font-family:'Saira Condensed',sans-serif;font-weight:600;text-transform:uppercase;letter-spacing:.04em;font-size:19px;padding:13px 0">
				<?php esc_html_e( 'Services', 'evag' ); ?>
				<span aria-hidden="true" class="evag-chev" style="font-size:18px;color:#5FB1D4">+</span>
			</summary>
			<div style="padding:4px 0 14px;display:flex;flex-direction:column;gap:2px">
				<a href="<?php echo esc_url( home_url( '/#services' ) ); ?>" data-scroll-to="services" style="display:block;padding:9px 0;color:#5FB1D4;font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.18em;text-transform:uppercase;text-decoration:none"><?php esc_html_e( 'All services', 'evag' ); ?></a>
				<?php foreach ( evag_services() as $slug => $s ) : ?>
					<a href="<?php echo esc_url( evag_service_url( $slug ) ); ?>" style="display:block;padding:9px 0;color:#C7CCD2;font-family:'Saira Condensed',sans-serif;font-weight:500;text-transform:uppercase;letter-spacing:.03em;font-size:15.5px;text-decoration:none"><?php echo esc_html( $s['menu_label'] ); ?></a>
				<?php endforeach; ?>
			</div>
		</details>

		<a href="<?php echo esc_url( home_url( '/#areas' ) ); ?>"    data-scroll-to="areas"    style="text-align:left;background:none;border:none;color:#E7EAEE;font-family:'Saira Condensed',sans-serif;font-weight:600;text-transform:uppercase;letter-spacing:.04em;font-size:19px;padding:13px 0;border-bottom:1px solid rgba(255,255,255,.07);text-decoration:none"><?php esc_html_e( 'Service Areas', 'evag' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/#work' ) ); ?>"     data-scroll-to="work"     style="text-align:left;background:none;border:none;color:#E7EAEE;font-family:'Saira Condensed',sans-serif;font-weight:600;text-transform:uppercase;letter-spacing:.04em;font-size:19px;padding:13px 0;border-bottom:1px solid rgba(255,255,255,.07);text-decoration:none"><?php esc_html_e( 'Recent Work', 'evag' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/#reviews' ) ); ?>"  data-scroll-to="reviews"  style="text-align:left;background:none;border:none;color:#E7EAEE;font-family:'Saira Condensed',sans-serif;font-weight:600;text-transform:uppercase;letter-spacing:.04em;font-size:19px;padding:13px 0;border-bottom:1px solid rgba(255,255,255,.07);text-decoration:none"><?php esc_html_e( 'Reviews', 'evag' ); ?></a>
		<a href="<?php echo esc_url( evag_blog_url() ); ?>" style="text-align:left;background:none;border:none;color:#E7EAEE;font-family:'Saira Condensed',sans-serif;font-weight:600;text-transform:uppercase;letter-spacing:.04em;font-size:19px;padding:13px 0;border-bottom:1px solid rgba(255,255,255,.07);text-decoration:none"><?php esc_html_e( 'Blog', 'evag' ); ?></a>
		<a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"  data-scroll-to="contact"  style="text-align:left;background:none;border:none;color:#E7EAEE;font-family:'Saira Condensed',sans-serif;font-weight:600;text-transform:uppercase;letter-spacing:.04em;font-size:19px;padding:13px 0;text-decoration:none"><?php esc_html_e( 'Contact', 'evag' ); ?></a>
	</div>
</header>
