<?php
/**
 * Sticky bottom bar — Call · Quote · Services. Visible only on mobile via CSS.
 *
 * @package evag
 */
$evag = evag_config();
?>

<div aria-hidden="true" class="evag-mobile" style="display:none;height:66px"></div>

<nav class="evag-mobile" aria-label="<?php esc_attr_e( 'Quick actions', 'evag' ); ?>" style="position:fixed;bottom:0;left:0;right:0;z-index:95;background:rgba(12,13,15,.96);backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border-top:1px solid rgba(255,255,255,.1);display:none;grid-template-columns:1fr 1.2fr 1fr;gap:1px;padding:8px;padding-bottom:max(8px,env(safe-area-inset-bottom))">
	<a href="tel:<?php echo esc_attr( $evag['phone_tel_href'] ); ?>" aria-label="<?php esc_attr_e( 'Call Extreme Vivid Auto Glass', 'evag' ); ?>" style="display:flex;flex-direction:column;align-items:center;gap:4px;padding:9px 4px;color:#fff;text-decoration:none;min-height:44px">
		<svg aria-hidden="true" focusable="false" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.37 1.9.72 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.35 1.85.59 2.81.72A2 2 0 0 1 22 16.92z"/></svg>
		<span style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:13px;text-transform:uppercase;letter-spacing:.04em"><?php esc_html_e( 'Call', 'evag' ); ?></span>
	</a>
	<a href="<?php echo esc_url( home_url( '/#quote' ) ); ?>" data-scroll-to="quote" style="display:flex;flex-direction:column;align-items:center;justify-content:center;gap:2px;background:#E01627;border:none;border-radius:4px;padding:9px 4px;color:#fff;text-decoration:none;min-height:44px">
		<span style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:14px;text-transform:uppercase;letter-spacing:.04em"><?php esc_html_e( 'Request Quote', 'evag' ); ?></span>
	</a>
	<a href="<?php echo esc_url( home_url( '/#services' ) ); ?>" data-scroll-to="services" aria-label="<?php esc_attr_e( 'Jump to services', 'evag' ); ?>" style="display:flex;flex-direction:column;align-items:center;gap:4px;padding:9px 4px;color:#fff;text-decoration:none;min-height:44px">
		<svg aria-hidden="true" focusable="false" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="14" rx="1"/><path d="M3 9h18"/><path d="M8 4v5"/></svg>
		<span style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:13px;text-transform:uppercase;letter-spacing:.04em"><?php esc_html_e( 'Services', 'evag' ); ?></span>
	</a>
</nav>
