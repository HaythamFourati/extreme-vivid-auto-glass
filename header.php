<?php
/**
 * Site header — opens <html>, prints <head>, prints sticky site header.
 *
 * @package evag
 */
$evag           = evag_config();
$site_url       = home_url( '/' );
$canonical      = ( is_front_page() || is_home() ) ? $site_url : home_url( add_query_arg( null, null ) );
$meta_desc      = $evag['meta_desc'];
$share_image    = $evag['hero_image'];
$share_image_alt = __( 'Extreme Vivid Auto Glass — branded mobile auto glass van in Baltimore', 'evag' );
$site_name      = get_bloginfo( 'name' ) ? get_bloginfo( 'name' ) : $evag['business_name'];
$share_title    = $evag['business_name'] . ' — ' . $evag['tagline'];
$og_type        = 'website';
$service        = evag_current_service();

if ( $service ) {
	$canonical       = evag_service_url( $service['slug'] );
	$meta_desc       = ! empty( $service['meta_desc'] ) ? $service['meta_desc'] : $service['short'];
	$share_title     = $service['h1'] . ' · ' . $evag['business_name'];
	$share_image     = ! empty( $service['image'] ) ? $service['image'] : $share_image;
	$share_image_alt = ! empty( $service['image_alt'] ) ? $service['image_alt'] : $service['h1'];
	$og_type         = 'article';
} elseif ( is_singular( 'post' ) ) {
	$post_id         = get_queried_object_id();
	$post_object     = get_post( $post_id );
	$canonical       = get_permalink( $post_id );
	$share_title     = get_the_title( $post_id ) . ' · ' . $evag['business_name'];
	$share_image     = get_the_post_thumbnail_url( $post_id, 'full' ) ?: $share_image;
	$share_image_alt = get_the_title( $post_id );
	$og_type         = 'article';

	if ( $post_object ) {
		$description_source = has_excerpt( $post_id ) ? $post_object->post_excerpt : $post_object->post_content;
		$meta_desc = wp_trim_words( wp_strip_all_tags( strip_shortcodes( $description_source ) ), 28, '…' );
	}
} elseif ( evag_is_blog_page() ) {
	$canonical   = evag_blog_url();
	$share_title = __( 'Auto Glass Advice for Maryland Drivers', 'evag' ) . ' · ' . $evag['business_name'];
	$meta_desc   = __( 'Practical advice about windshield damage, auto glass replacement, insurance and ADAS recalibration for Maryland drivers.', 'evag' );
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#0C0D0F">

	<meta name="description" content="<?php echo esc_attr( $meta_desc ); ?>">
	<link rel="canonical" href="<?php echo esc_url( $canonical ); ?>">
	<meta name="robots" content="index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1">

	<meta property="og:type" content="<?php echo esc_attr( $og_type ); ?>">
	<meta property="og:site_name" content="<?php echo esc_attr( $site_name ); ?>">
	<meta property="og:title" content="<?php echo esc_attr( $share_title ); ?>">
	<meta property="og:description" content="<?php echo esc_attr( $meta_desc ); ?>">
	<meta property="og:url" content="<?php echo esc_url( $canonical ); ?>">
	<meta property="og:image" content="<?php echo esc_url( $share_image ); ?>">
	<meta property="og:image:alt" content="<?php echo esc_attr( $share_image_alt ); ?>">
	<meta property="og:locale" content="en_US">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="<?php echo esc_attr( $share_title ); ?>">
	<meta name="twitter:description" content="<?php echo esc_attr( $meta_desc ); ?>">
	<meta name="twitter:image" content="<?php echo esc_url( $share_image ); ?>">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preconnect" href="https://ev-autoglass.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Saira+Condensed:wght@500;600;700;800&family=IBM+Plex+Sans:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">

	<?php if ( is_front_page() ) : ?>
		<link rel="preload" as="image" href="<?php echo esc_url( $evag['hero_image'] ); ?>" fetchpriority="high">
	<?php endif; ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="background:#0C0D0F;color:#fff;font-family:'IBM Plex Sans',system-ui,sans-serif;-webkit-font-smoothing:antialiased;overflow-x:hidden">
<?php wp_body_open(); ?>

<a class="evag-skiplink" href="#primary"><?php esc_html_e( 'Skip to main content', 'evag' ); ?></a>

<?php
// -----------------------------------------------------------------------------
// Structured data — @graph: WebSite + LocalBusiness/AutoRepair + Services + FAQPage.
// Mobile-only operator: no PostalAddress; expressed via areaServed + serviceArea.
// -----------------------------------------------------------------------------
$business_id = trailingslashit( $site_url ) . '#business';
$website_id  = trailingslashit( $site_url ) . '#website';

$service_offers = array();
$service_list = array(
	array( 'Windshield Replacement',     __( 'Mobile windshield replacement with quality glass, properly bonded, sealed and cured.', 'evag' ) ),
	array( 'Windshield Repair',          __( 'Resin chip and crack repair to stop damage from spreading.', 'evag' ) ),
	array( 'Door Glass Replacement',     __( 'Door glass replacement with full debris cleanup.', 'evag' ) ),
	array( 'Side Window Replacement',    __( 'Side and vent window replacement, mobile service.', 'evag' ) ),
	array( 'Rear Windshield Replacement', __( 'Back glass and rear windshield replacement, including defroster-equipped glass.', 'evag' ) ),
	array( 'Stone Chip Repair',          __( 'Quick resin repair for highway rock chips.', 'evag' ) ),
	array( 'Leaking Windshield Repair',  __( 'Diagnose and re-seal improperly bonded glass.', 'evag' ) ),
	array( 'ADAS Recalibration',         __( 'Camera and sensor recalibration after windshield replacement.', 'evag' ) ),
);
foreach ( $service_list as $svc ) {
	$service_offers[] = array(
		'@type'       => 'Service',
		'serviceType' => $svc[0],
		'description' => $svc[1],
		'provider'    => array( '@id' => $business_id ),
		'areaServed'  => $evag['areas_served'],
	);
}

$faq_entities = array();
foreach ( evag_faqs() as $faq ) {
	$faq_entities[] = array(
		'@type'          => 'Question',
		'name'           => $faq[0],
		'acceptedAnswer' => array(
			'@type' => 'Answer',
			'text'  => $faq[1],
		),
	);
}

$graph = array(
	array(
		'@type'           => 'WebSite',
		'@id'             => $website_id,
		'url'             => $site_url,
		'name'            => $site_name,
		'description'     => $meta_desc,
		'inLanguage'      => 'en-US',
		'publisher'       => array( '@id' => $business_id ),
	),
	array(
		'@type'           => array( 'LocalBusiness', 'AutoRepair' ),
		'@id'             => $business_id,
		'name'            => $evag['business_name'],
		'url'             => $site_url,
		'telephone'       => $evag['phone_tel'],
		'image'           => $evag['hero_image'],
		'logo'            => $evag['hero_image'],
		'description'     => $meta_desc,
		'priceRange'      => '$$',
		'foundingDate'    => '2003',
		'currenciesAccepted' => 'USD',
		'paymentAccepted' => 'Cash, Credit Card, Insurance',
		'areaServed'      => array_map(
			static function ( $area ) {
				return array( '@type' => 'AdministrativeArea', 'name' => $area );
			},
			$evag['areas_served']
		),
		'serviceArea'     => array(
			'@type'       => 'GeoCircle',
			'geoMidpoint' => array(
				'@type'     => 'GeoCoordinates',
				'latitude'  => 39.2904,
				'longitude' => -76.6122,
			),
			'geoRadius'   => 60000,
		),
		'openingHoursSpecification' => array(
			array(
				'@type'     => 'OpeningHoursSpecification',
				'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ),
				'opens'     => '08:00',
				'closes'    => '17:00',
			),
		),
		'aggregateRating' => array(
			'@type'       => 'AggregateRating',
			'ratingValue' => '5.0',
			'reviewCount' => (string) $evag['reviews_count'],
			'bestRating'  => '5',
		),
		'makesOffer'      => $service_offers,
		'sameAs'          => $evag['social'],
	),
);

if ( is_front_page() ) {
	$graph[] = array(
		'@type'      => 'FAQPage',
		'mainEntity' => $faq_entities,
	);
}

$schema = array(
	'@context' => 'https://schema.org',
	'@graph'   => $graph,
);
?>
<script type="application/ld+json"><?php echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?></script>

<div style="background:#0C0D0F;color:#fff;min-height:100vh;position:relative">
<span id="top"></span>

<?php get_template_part( 'template-parts/header/site-header' ); ?>
