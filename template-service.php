<?php
/**
 * Single Service template — rendered for /services/{slug}/.
 *
 * @package evag
 */

$service = evag_current_service();

if ( ! $service ) {
	// Defensive — functions.php should have already 404'd.
	get_template_part( '404' );
	return;
}

$evag     = evag_config();
$services = evag_services();

// Related services: same vertical (windshield-related vs. side/door vs. ADAS).
$related = array();
foreach ( $services as $slug => $s ) {
	if ( $slug === $service['slug'] ) {
		continue;
	}
	$related[] = $s;
	if ( count( $related ) >= 3 ) {
		break;
	}
}

get_header(); ?>

<main id="primary">

	<!-- Hero -->
	<section style="position:relative;padding:calc(70px + clamp(40px,7vw,86px)) clamp(16px,4vw,40px) clamp(48px,6vw,80px);overflow:hidden;background:radial-gradient(120% 90% at 80% -10%,#1A1D22 0%,#0C0D0F 60%);color:#fff">
		<div aria-hidden="true" style="position:absolute;inset:0;background-image:repeating-linear-gradient(98deg,transparent 0 38px,rgba(255,255,255,.018) 38px 40px);pointer-events:none"></div>

		<div style="position:relative;max-width:1100px;margin:0 auto">

			<!-- Breadcrumb -->
			<nav aria-label="<?php esc_attr_e( 'Breadcrumb', 'evag' ); ?>" data-reveal style="display:flex;flex-wrap:wrap;align-items:center;gap:8px;font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.18em;text-transform:uppercase;color:#7E858E;margin-bottom:24px">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color:#5FB1D4;text-decoration:none"><?php esc_html_e( 'Home', 'evag' ); ?></a>
				<span aria-hidden="true">/</span>
				<a href="<?php echo esc_url( home_url( '/#services' ) ); ?>" style="color:#5FB1D4;text-decoration:none"><?php esc_html_e( 'Services', 'evag' ); ?></a>
				<span aria-hidden="true">/</span>
				<span style="color:#C2C7CD"><?php echo esc_html( $service['menu_label'] ); ?></span>
			</nav>

			<div data-reveal class="evag-hero-eyebrow" style="display:inline-flex;align-items:center;gap:10px;font-family:'IBM Plex Mono',monospace;font-size:12px;letter-spacing:.2em;text-transform:uppercase;color:#5FB1D4;margin-bottom:14px">
				<span aria-hidden="true" style="width:7px;height:7px;border-radius:50%;background:#5FB1D4;animation:evSheen-pulse 2.4s ease infinite"></span>
				<?php echo esc_html( $service['kicker'] ); ?>
			</div>

			<h1 data-reveal class="evag-hero-h1" style="font-family:'Saira Condensed',sans-serif;font-weight:800;font-size:clamp(38px,6vw,72px);line-height:.96;text-transform:uppercase;letter-spacing:.004em;margin:0;text-wrap:balance;max-width:18ch"><?php echo esc_html( $service['h1'] ); ?></h1>

			<p data-reveal class="evag-hero-lede" style="margin-top:22px;max-width:620px;font-size:clamp(15.5px,1.5vw,18px);line-height:1.55;color:#C2C7CD;text-wrap:pretty"><?php echo esc_html( $service['short'] ); ?></p>

			<div data-reveal class="evag-hero-ctas" style="display:flex;flex-wrap:wrap;gap:12px;margin-top:30px">
				<a href="<?php echo esc_url( home_url( '/#quote' ) ); ?>" data-scroll-to="quote" style="display:inline-flex;align-items:center;gap:8px;background:#E01627;color:#fff;font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:17px;letter-spacing:.04em;text-transform:uppercase;padding:14px 26px;border:none;border-radius:4px;text-decoration:none;box-shadow:0 16px 30px -14px rgba(224,22,39,.8)"><?php esc_html_e( 'Request a Quote →', 'evag' ); ?></a>
				<a href="tel:<?php echo esc_attr( $evag['phone_tel_href'] ); ?>" style="display:inline-flex;align-items:center;gap:8px;background:transparent;color:#fff;font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:17px;letter-spacing:.04em;text-transform:uppercase;padding:14px 26px;border:1px solid rgba(255,255,255,.22);border-radius:4px;text-decoration:none"><?php echo esc_html( sprintf( __( 'Call %s', 'evag' ), $evag['phone_display'] ) ); ?></a>
			</div>
		</div>
	</section>

	<!-- Fast-facts strip — AI-citable structured info -->
	<?php
	$facts = array();
	if ( ! empty( $service['duration'] ) )      $facts[] = array( __( 'Typical Duration', 'evag' ), $service['duration'] );
	if ( ! empty( $service['vehicles'] ) )      $facts[] = array( __( 'Vehicles', 'evag' ),         $service['vehicles'] );
	if ( ! empty( $service['price_note'] ) )    $facts[] = array( __( 'Pricing', 'evag' ),          $service['price_note'] );
	$facts[] = array( __( 'Service Area', 'evag' ), __( 'Baltimore, Anne Arundel, Carroll & Harford counties', 'evag' ) );
	?>
	<?php if ( $facts ) : ?>
	<section style="background:#0C0D0F;color:#fff;border-top:1px solid rgba(255,255,255,.06);border-bottom:1px solid rgba(255,255,255,.06)">
		<div style="max-width:1100px;margin:0 auto;padding:clamp(28px,4vw,40px) clamp(16px,4vw,40px);display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:clamp(20px,3vw,40px)">
			<?php foreach ( $facts as $f ) : ?>
				<div data-reveal>
					<div style="font-family:'IBM Plex Mono',monospace;font-size:10px;letter-spacing:.2em;text-transform:uppercase;color:#5FB1D4;margin-bottom:8px"><?php echo esc_html( $f[0] ); ?></div>
					<div style="font-size:14.5px;line-height:1.5;color:#D5D9DE"><?php echo esc_html( $f[1] ); ?></div>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
	<?php endif; ?>

	<!-- Body: highlights + long copy + image -->
	<section style="background:#F5F6F8;color:#14161A;padding:clamp(56px,8vw,104px) clamp(16px,4vw,40px)">
		<div style="max-width:1100px;margin:0 auto;display:grid;grid-template-columns:1.2fr 1fr;gap:clamp(28px,4vw,56px);align-items:start" class="evag-svc-grid">

			<div>
				<div data-reveal style="font-family:'IBM Plex Mono',monospace;font-size:12px;letter-spacing:.2em;text-transform:uppercase;color:#1E7FA6;margin-bottom:12px"><?php esc_html_e( 'What you get', 'evag' ); ?></div>
				<h2 data-reveal style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:clamp(26px,3.4vw,40px);line-height:1.04;text-transform:uppercase;margin:0 0 26px"><?php esc_html_e( 'Done right the first time', 'evag' ); ?></h2>

				<?php foreach ( $service['body'] as $i => $para ) : ?>
					<p data-reveal style="--reveal-delay:<?php echo (int) ( $i * 60 ); ?>ms;font-size:16px;line-height:1.65;color:#3A3F46;margin:0 0 16px;max-width:60ch"><?php echo esc_html( $para ); ?></p>
				<?php endforeach; ?>

				<ul data-reveal style="list-style:none;padding:0;margin:28px 0 0;display:grid;gap:10px;max-width:60ch">
					<?php foreach ( $service['highlights'] as $point ) : ?>
						<li style="display:flex;align-items:flex-start;gap:12px;font-size:15.5px;line-height:1.5;color:#14161A">
							<span aria-hidden="true" style="flex:none;margin-top:3px;width:18px;height:18px;border-radius:50%;background:#E01627;color:#fff;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700">✓</span>
							<span><?php echo esc_html( $point ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<aside data-reveal style="position:relative;border-radius:6px;overflow:hidden;background:#15171B;min-height:340px;aspect-ratio:4/5">
				<?php if ( ! empty( $service['image'] ) ) : ?>
					<img src="<?php echo esc_url( $service['image'] ); ?>" alt="<?php echo esc_attr( $service['image_alt'] ); ?>" loading="lazy" decoding="async" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover<?php echo isset( $service['object_pos'] ) ? ';object-position:' . esc_attr( $service['object_pos'] ) : ''; ?>;display:block">
				<?php else : ?>
					<div style="position:absolute;inset:0;background:#15171B;background-image:repeating-linear-gradient(115deg,rgba(95,177,212,.10) 0 2px,transparent 2px 22px);display:flex;align-items:flex-end;padding:18px">
						<span style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.18em;color:#5FB1D4;text-transform:uppercase"><?php echo esc_html( $service['kicker'] ); ?></span>
					</div>
				<?php endif; ?>
			</aside>
		</div>
	</section>

	<!-- Process -->
	<?php if ( ! empty( $service['process'] ) ) : ?>
	<section style="background:#0C0D0F;color:#fff;padding:clamp(56px,8vw,104px) clamp(16px,4vw,40px)">
		<div style="max-width:1100px;margin:0 auto">
			<div data-reveal style="max-width:680px;margin-bottom:44px">
				<div style="font-family:'IBM Plex Mono',monospace;font-size:12px;letter-spacing:.2em;text-transform:uppercase;color:#5FB1D4;margin-bottom:12px"><?php esc_html_e( 'How it works', 'evag' ); ?></div>
				<h2 style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:clamp(28px,3.6vw,44px);line-height:1.04;text-transform:uppercase;margin:0"><?php esc_html_e( 'A simple, careful process', 'evag' ); ?></h2>
			</div>
			<ol style="list-style:none;padding:0;margin:0;display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:18px;counter-reset:step">
				<?php foreach ( $service['process'] as $i => $step ) : ?>
					<li data-reveal style="--reveal-delay:<?php echo (int) ( $i * 80 ); ?>ms;background:#15171B;border:1px solid rgba(255,255,255,.08);border-radius:6px;padding:24px;counter-increment:step">
						<div style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.18em;color:#E01627;margin-bottom:10px">0<?php echo (int) ( $i + 1 ); ?></div>
						<h3 style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:22px;text-transform:uppercase;margin:0 0 8px;line-height:1.05"><?php echo esc_html( $step[0] ); ?></h3>
						<p style="margin:0;color:#A6ADB5;font-size:14.5px;line-height:1.55"><?php echo esc_html( $step[1] ); ?></p>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</section>
	<?php endif; ?>

	<!-- Editable WordPress page content (Gutenberg) -->
	<?php
	$service_page = evag_get_service_page( $service['slug'] );
	if ( $service_page ) :
		$rendered = apply_filters( 'the_content', $service_page->post_content );
		$rendered = str_replace( ']]>', ']]&gt;', $rendered );
		$has_content = trim( wp_strip_all_tags( $rendered ) ) !== '';
	else :
		$has_content = false;
	endif;
	?>
	<?php if ( $has_content ) : ?>
	<section style="background:#fff;color:#14161A;padding:clamp(56px,8vw,104px) clamp(16px,4vw,40px);border-top:1px solid #E4E7EB">
		<div style="max-width:760px;margin:0 auto">
			<div data-reveal style="margin-bottom:24px">
				<div style="font-family:'IBM Plex Mono',monospace;font-size:12px;letter-spacing:.2em;text-transform:uppercase;color:#1E7FA6;margin-bottom:10px"><?php esc_html_e( 'More about this service', 'evag' ); ?></div>
			</div>
			<div data-reveal class="evag-wp-content"><?php echo $rendered; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- post_content via the_content filter ?></div>
			<?php if ( current_user_can( 'edit_post', $service_page->ID ) ) : ?>
				<p style="margin-top:24px"><a href="<?php echo esc_url( get_edit_post_link( $service_page->ID ) ); ?>" style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.18em;text-transform:uppercase;color:#1E7FA6;text-decoration:none"><?php esc_html_e( 'Edit this content →', 'evag' ); ?></a></p>
			<?php endif; ?>
		</div>
	</section>
	<?php endif; ?>

	<!-- Service areas — local SEO signal -->
	<section style="background:#F5F6F8;color:#14161A;padding:clamp(56px,8vw,104px) clamp(16px,4vw,40px);border-top:1px solid #E4E7EB">
		<div style="max-width:1100px;margin:0 auto">
			<div data-reveal style="max-width:680px;margin-bottom:32px">
				<div style="font-family:'IBM Plex Mono',monospace;font-size:12px;letter-spacing:.2em;text-transform:uppercase;color:#1E7FA6;margin-bottom:12px"><?php esc_html_e( 'Where we work', 'evag' ); ?></div>
				<h2 style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:clamp(26px,3.4vw,40px);line-height:1.04;text-transform:uppercase;margin:0 0 14px"><?php
					/* translators: %s: service kicker (e.g. Windshield Replacement) */
					echo esc_html( sprintf( __( '%s across the Baltimore metro', 'evag' ), $service['kicker'] ) );
				?></h2>
				<p style="margin:0;color:#3A3F46;font-size:16px;line-height:1.6;max-width:60ch"><?php
					/* translators: %s: service kicker */
					echo esc_html( sprintf( __( 'Our mobile technicians deliver %s at your home, workplace or lot. We service the following counties and surrounding communities:', 'evag' ), strtolower( $service['kicker'] ) ) );
				?></p>
			</div>

			<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:12px;margin-bottom:28px">
				<?php foreach ( $evag['service_areas'] as $i => $area ) : ?>
					<div data-reveal style="--reveal-delay:<?php echo (int) ( $i * 40 ); ?>ms;background:#fff;border:1px solid #E4E7EB;border-radius:4px;padding:14px 16px;display:flex;align-items:center;gap:10px">
						<span aria-hidden="true" style="flex:none;width:8px;height:8px;border-radius:50%;background:#E01627"></span>
						<span style="font-family:'Saira Condensed',sans-serif;font-weight:600;font-size:15.5px;text-transform:uppercase;letter-spacing:.02em"><?php echo esc_html( $area ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>

			<p data-reveal style="margin:0;color:#454A50;font-size:14.5px;line-height:1.6;max-width:62ch"><?php esc_html_e( 'Send your ZIP and vehicle details and we’ll confirm same-day or next-day availability. Trusted by Baltimore drivers since 2003.', 'evag' ); ?></p>
		</div>
	</section>

	<!-- FAQ — AI + voice search optimized -->
	<?php if ( ! empty( $service['faqs'] ) ) : ?>
	<section style="background:#0C0D0F;color:#fff;padding:clamp(56px,8vw,104px) clamp(16px,4vw,40px)">
		<div style="max-width:880px;margin:0 auto">
			<div data-reveal style="margin-bottom:36px">
				<div style="font-family:'IBM Plex Mono',monospace;font-size:12px;letter-spacing:.2em;text-transform:uppercase;color:#5FB1D4;margin-bottom:12px"><?php esc_html_e( 'Frequently asked', 'evag' ); ?></div>
				<h2 style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:clamp(28px,3.6vw,44px);line-height:1.04;text-transform:uppercase;margin:0"><?php echo esc_html( sprintf( __( 'About %s', 'evag' ), $service['kicker'] ) ); ?></h2>
			</div>
			<div class="evag-faq-list" style="display:grid;gap:8px">
				<?php foreach ( $service['faqs'] as $i => $faq ) : ?>
					<details data-reveal class="evag-faq" <?php echo 0 === $i ? 'open' : ''; ?> style="--reveal-delay:<?php echo (int) ( $i * 50 ); ?>ms;background:#15171B;border:1px solid rgba(255,255,255,.08);border-radius:6px;overflow:hidden">
						<summary style="list-style:none;display:flex;align-items:center;justify-content:space-between;gap:18px;cursor:pointer;padding:18px 20px;font-family:'Saira Condensed',sans-serif;font-weight:600;font-size:18px;letter-spacing:.01em;text-transform:uppercase;color:#fff">
							<span><?php echo esc_html( $faq[0] ); ?></span>
							<span aria-hidden="true" class="evag-faq-icon" style="flex:none;width:28px;height:28px;border-radius:50%;background:rgba(95,177,212,.12);color:#5FB1D4;display:flex;align-items:center;justify-content:center;font-size:18px;line-height:1;transition:transform .2s ease">+</span>
						</summary>
						<div style="padding:0 20px 20px;color:#A6ADB5;font-size:15px;line-height:1.65"><?php echo esc_html( $faq[1] ); ?></div>
					</details>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<!-- Related services -->
	<section style="background:#F5F6F8;color:#14161A;padding:clamp(56px,8vw,104px) clamp(16px,4vw,40px)">
		<div style="max-width:1280px;margin:0 auto">
			<div data-reveal style="margin-bottom:36px;max-width:680px">
				<div style="font-family:'IBM Plex Mono',monospace;font-size:12px;letter-spacing:.2em;text-transform:uppercase;color:#1E7FA6;margin-bottom:12px"><?php esc_html_e( 'Other services', 'evag' ); ?></div>
				<h2 style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:clamp(26px,3.4vw,40px);line-height:1.04;text-transform:uppercase;margin:0"><?php esc_html_e( 'Need something else?', 'evag' ); ?></h2>
			</div>
			<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:16px">
				<?php foreach ( $related as $i => $r ) : ?>
					<a data-reveal class="evag-svc-card" href="<?php echo esc_url( evag_service_url( $r['slug'] ) ); ?>" style="--reveal-delay:<?php echo (int) ( $i * 60 ); ?>ms;background:#fff;border:1px solid #E4E7EB;border-radius:4px;overflow:hidden;display:flex;flex-direction:column;text-decoration:none;color:inherit">
						<?php if ( ! empty( $r['image'] ) ) : ?>
							<div style="height:160px;overflow:hidden;position:relative">
								<img src="<?php echo esc_url( $r['image'] ); ?>" alt="<?php echo esc_attr( $r['image_alt'] ); ?>" loading="lazy" decoding="async" style="width:100%;height:100%;object-fit:cover<?php echo isset( $r['object_pos'] ) ? ';object-position:' . esc_attr( $r['object_pos'] ) : ''; ?>;display:block">
							</div>
						<?php else : ?>
							<div style="height:160px;background:#15171B;background-image:repeating-linear-gradient(115deg,rgba(255,255,255,.045) 0 2px,transparent 2px 22px);display:flex;align-items:flex-end;padding:14px">
								<span style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.18em;color:#5FB1D4;text-transform:uppercase"><?php echo esc_html( ! empty( $r['pattern_header'] ) ? $r['pattern_header'] : $r['kicker'] ); ?></span>
							</div>
						<?php endif; ?>
						<div style="padding:20px 20px 22px;display:flex;flex-direction:column;flex:1">
							<span style="font-family:'IBM Plex Mono',monospace;font-size:11px;letter-spacing:.16em;text-transform:uppercase;color:#1E7FA6;margin-bottom:8px"><?php echo esc_html( $r['kicker'] ); ?></span>
							<h3 style="font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:22px;text-transform:uppercase;line-height:1;margin:0 0 8px"><?php echo esc_html( $r['title'] ); ?></h3>
							<p style="font-size:14px;color:#454A50;line-height:1.55;flex:1;margin:0"><?php echo esc_html( $r['short'] ); ?></p>
							<span style="margin-top:14px;color:#E01627;font-family:'Saira Condensed',sans-serif;font-weight:700;font-size:15px;text-transform:uppercase;letter-spacing:.04em"><?php esc_html_e( 'Learn more →', 'evag' ); ?></span>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php
	// Reuse homepage CTA section.
	get_template_part( 'template-parts/homepage/final-cta' );
	?>

	<style>
		@media (max-width: 760px) {
			.evag-svc-grid { grid-template-columns: 1fr !important; }
		}
	</style>
</main>

<?php get_footer();
