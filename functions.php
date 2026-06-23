<?php
/**
 * Extreme Vivid Auto Glass — theme bootstrap.
 *
 * @package evag
 */

defined( 'ABSPATH' ) || exit;

define( 'EVAG_THEME_VERSION', '1.0.0' );
define( 'EVAG_THEME_DIR', get_template_directory() );
define( 'EVAG_THEME_URI', get_template_directory_uri() );

require_once EVAG_THEME_DIR . '/inc/site-config.php';
require_once EVAG_THEME_DIR . '/inc/services-config.php';
require_once EVAG_THEME_DIR . '/inc/contact-form-7.php';

/**
 * Theme supports.
 */
function evag_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );

	load_theme_textdomain( 'evag', EVAG_THEME_DIR . '/languages' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary (header)', 'evag' ),
		)
	);
}
add_action( 'after_setup_theme', 'evag_setup' );

/**
 * Return the page ID used for the blog index.
 *
 * Uses WordPress's configured Posts page when present. Otherwise it finds the
 * theme-managed /blog/ page.
 *
 * @return int
 */
function evag_blog_page_id() {
	$posts_page_id = (int) get_option( 'page_for_posts' );
	if ( $posts_page_id ) {
		return $posts_page_id;
	}

	$pages = get_posts(
		array(
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'posts_per_page' => 1,
			'fields'         => 'ids',
			'meta_key'       => '_evag_blog_page',
			'meta_value'     => '1',
		)
	);

	if ( $pages ) {
		return (int) $pages[0];
	}

	$page = get_page_by_path( 'blog' );
	return $page instanceof WP_Post ? (int) $page->ID : 0;
}

/**
 * Return the public blog index URL.
 *
 * @return string
 */
function evag_blog_url() {
	$page_id = evag_blog_page_id();
	return $page_id ? get_permalink( $page_id ) : home_url( '/blog/' );
}

/**
 * Whether the current request is the blog index.
 *
 * @return bool
 */
function evag_is_blog_page() {
	$page_id = evag_blog_page_id();

	return is_home()
		|| is_page_template( 'page-blog.php' )
		|| ( $page_id && is_page( $page_id ) );
}

/**
 * Create a native /blog/ page when WordPress does not already have a Posts
 * page or a page using that slug.
 */
function evag_maybe_create_blog_page() {
	if ( (int) get_option( 'page_for_posts' ) ) {
		return;
	}

	$existing_page_id = evag_blog_page_id();
	if ( $existing_page_id ) {
		update_post_meta( $existing_page_id, '_evag_blog_page', '1' );
		update_post_meta( $existing_page_id, '_wp_page_template', 'page-blog.php' );
		return;
	}

	$page_id = wp_insert_post(
		array(
			'post_title'  => __( 'Blog', 'evag' ),
			'post_name'   => 'blog',
			'post_status' => 'publish',
			'post_type'   => 'page',
			'meta_input'  => array(
				'_evag_blog_page'  => '1',
				'_wp_page_template' => 'page-blog.php',
			),
		),
		true
	);

	if ( is_wp_error( $page_id ) ) {
		return;
	}

	update_post_meta( $page_id, '_evag_blog_page', '1' );
	update_post_meta( $page_id, '_wp_page_template', 'page-blog.php' );
}
add_action( 'init', 'evag_maybe_create_blog_page', 35 );

/**
 * Enqueue compiled CSS (Tailwind v4 -> build/index.css) and JS (wp-scripts -> build/index.js).
 *
 * Both build artifacts may be absent on a fresh checkout; guarded with file_exists.
 */
function evag_enqueue_assets() {
	$css_path = EVAG_THEME_DIR . '/build/index.css';
	$css_uri  = EVAG_THEME_URI . '/build/index.css';

	if ( file_exists( $css_path ) ) {
		wp_enqueue_style(
			'evag-app',
			$css_uri,
			array(),
			(string) filemtime( $css_path )
		);
	}

	$js_path   = EVAG_THEME_DIR . '/build/index.js';
	$js_uri    = EVAG_THEME_URI . '/build/index.js';
	$asset_php = EVAG_THEME_DIR . '/build/index.asset.php';

	if ( file_exists( $js_path ) ) {
		$asset = file_exists( $asset_php )
			? require $asset_php
			: array(
				'dependencies' => array(),
				'version'      => (string) filemtime( $js_path ),
			);

		wp_enqueue_script(
			'evag-app',
			$js_uri,
			$asset['dependencies'],
			$asset['version'],
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'evag_enqueue_assets' );

/**
 * Remove WP front-end clutter that doesn't belong on a single-page marketing site.
 */
function evag_dequeue_block_library() {
	if ( ! is_admin() ) {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_dequeue_style( 'global-styles' );
		wp_dequeue_style( 'classic-theme-styles' );
	}
}
add_action( 'wp_enqueue_scripts', 'evag_dequeue_block_library', 100 );

remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );

/**
 * Register the /services/{slug}/ rewrite rule and query var.
 */
function evag_register_service_rewrite() {
	add_rewrite_tag( '%evag_service%', '([^/]+)' );
	add_rewrite_rule(
		'^services/([^/]+)/?$',
		'index.php?evag_service=$matches[1]',
		'top'
	);
}
add_action( 'init', 'evag_register_service_rewrite' );

/**
 * Auto-flush rewrite rules once when the services rewrite version changes.
 * Bump EVAG_SERVICES_REWRITE_VERSION whenever the rule structure changes
 * so existing installs pick up the new rules on the next page load.
 */
define( 'EVAG_SERVICES_REWRITE_VERSION', '1' );

function evag_maybe_flush_service_rewrites() {
	if ( get_option( 'evag_services_rewrite_version' ) !== EVAG_SERVICES_REWRITE_VERSION ) {
		evag_register_service_rewrite();
		flush_rewrite_rules( false );
		update_option( 'evag_services_rewrite_version', EVAG_SERVICES_REWRITE_VERSION );
	}
}
add_action( 'init', 'evag_maybe_flush_service_rewrites', 20 );

/**
 * Flush rewrite rules on theme switch as well (covers fresh activations).
 */
function evag_flush_rewrites_on_switch() {
	evag_register_service_rewrite();
	flush_rewrite_rules();
	delete_option( 'evag_services_rewrite_version' );
}
add_action( 'after_switch_theme', 'evag_flush_rewrites_on_switch' );

/**
 * Allow our custom query var.
 *
 * @param array $vars Query vars.
 * @return array
 */
function evag_register_query_vars( $vars ) {
	$vars[] = 'evag_service';
	return $vars;
}
add_filter( 'query_vars', 'evag_register_query_vars' );

/**
 * Route /services/{slug}/ requests to template-service.php when the slug matches
 * a configured service. Unknown slugs 404 normally.
 *
 * @param string $template The template WordPress was about to load.
 * @return string
 */
function evag_load_service_template( $template ) {
	$slug = get_query_var( 'evag_service' );
	if ( ! $slug ) {
		return $template;
	}

	$services = evag_services();
	if ( ! isset( $services[ $slug ] ) ) {
		// Unknown service slug — let WordPress 404.
		global $wp_query;
		$wp_query->set_404();
		status_header( 404 );
		return get_404_template();
	}

	$located = EVAG_THEME_DIR . '/template-service.php';
	if ( file_exists( $located ) ) {
		return $located;
	}
	return $template;
}
add_filter( 'template_include', 'evag_load_service_template' );

/**
 * If the current request is a service page, expose the active service array
 * via a small helper so templates don't repeat the lookup.
 *
 * @return array|null
 */
function evag_current_service() {
	$slug = get_query_var( 'evag_service' );
	if ( ! $slug ) {
		return null;
	}
	$services = evag_services();
	return isset( $services[ $slug ] ) ? $services[ $slug ] : null;
}

/* ============================================================
 * Editable WordPress page per service.
 *
 * Each service has a backing WP Page (post_type=page) tagged with the
 * `_evag_service_slug` meta key. Admins can edit that page in the Gutenberg
 * block editor and the contents are rendered inside template-service.php.
 *
 * The pages are auto-created on first load so the admin never has to wire
 * anything up manually. They are hidden from the public sitemap/search to
 * avoid duplicate content with /services/{slug}/.
 * ============================================================ */

define( 'EVAG_SERVICE_META_KEY', '_evag_service_slug' );

/**
 * Find the WP Page backing a service slug, if one exists.
 *
 * @param string $slug Service slug.
 * @return WP_Post|null
 */
function evag_get_service_page( $slug ) {
	if ( ! $slug ) {
		return null;
	}

	$cache_key = 'evag_service_page_' . md5( $slug );
	$cached    = wp_cache_get( $cache_key, 'evag' );
	if ( false !== $cached ) {
		return $cached ? get_post( $cached ) : null;
	}

	$query = new WP_Query( array(
		'post_type'              => 'page',
		'post_status'            => array( 'publish', 'draft', 'private' ),
		'posts_per_page'         => 1,
		'no_found_rows'          => true,
		'update_post_term_cache' => false,
		'meta_key'               => EVAG_SERVICE_META_KEY,
		'meta_value'             => $slug,
		'fields'                 => 'ids',
	) );

	$post_id = ! empty( $query->posts ) ? (int) $query->posts[0] : 0;
	wp_cache_set( $cache_key, $post_id, 'evag', 5 * MINUTE_IN_SECONDS );

	return $post_id ? get_post( $post_id ) : null;
}

/**
 * Auto-create one WP Page per configured service so admins can edit them in
 * Gutenberg right away. Runs once per services version bump.
 */
define( 'EVAG_SERVICE_PAGES_VERSION', '1' );

function evag_maybe_create_service_pages() {
	if ( get_option( 'evag_service_pages_version' ) === EVAG_SERVICE_PAGES_VERSION ) {
		return;
	}

	$services = evag_services();
	foreach ( $services as $slug => $s ) {
		// Skip if a page already exists.
		if ( evag_get_service_page( $slug ) ) {
			continue;
		}

		$starter_content = sprintf(
			"<!-- wp:paragraph -->\n<p>%s</p>\n<!-- /wp:paragraph -->",
			esc_html( $s['short'] )
		);

		$post_id = wp_insert_post( array(
			'post_title'   => sprintf( __( 'Service: %s', 'evag' ), $s['menu_label'] ),
			'post_name'    => 'service-' . $slug,
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_content' => $starter_content,
			'meta_input'   => array(
				EVAG_SERVICE_META_KEY => $slug,
			),
		), true );

		if ( ! is_wp_error( $post_id ) ) {
			wp_cache_delete( 'evag_service_page_' . md5( $slug ), 'evag' );
		}
	}

	update_option( 'evag_service_pages_version', EVAG_SERVICE_PAGES_VERSION );
}
add_action( 'init', 'evag_maybe_create_service_pages', 30 );

/**
 * Surface service pages in the admin Pages list with a clearer column so the
 * admin can tell at a glance which page maps to which service.
 */
function evag_pages_columns( $columns ) {
	$columns['evag_service'] = __( 'Service Slug', 'evag' );
	return $columns;
}
add_filter( 'manage_pages_columns', 'evag_pages_columns' );

function evag_pages_column_content( $column, $post_id ) {
	if ( 'evag_service' === $column ) {
		$slug = get_post_meta( $post_id, EVAG_SERVICE_META_KEY, true );
		echo $slug
			? '<code>/services/' . esc_html( $slug ) . '/</code>'
			: '—';
	}
}
add_action( 'manage_pages_custom_column', 'evag_pages_column_content', 10, 2 );

/**
 * Keep service-backing pages out of public WP queries (search, sitemap, etc.)
 * to avoid duplicate content vs. the canonical /services/{slug}/ URL.
 */
function evag_exclude_service_pages_from_search( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}
	if ( $query->is_search() ) {
		$meta_query = (array) $query->get( 'meta_query' );
		$meta_query[] = array(
			'key'     => EVAG_SERVICE_META_KEY,
			'compare' => 'NOT EXISTS',
		);
		$query->set( 'meta_query', $meta_query );
	}
}
add_action( 'pre_get_posts', 'evag_exclude_service_pages_from_search' );

/* ============================================================
 * SEO — document title and structured data for service pages.
 * General meta, canonical and social tags are rendered once in header.php.
 * ============================================================ */

/**
 * Set the document title on /services/{slug}/ pages.
 */
function evag_service_document_title_parts( $parts ) {
	$service = evag_current_service();
	if ( ! $service ) {
		return $parts;
	}
	$parts['title'] = $service['h1'];
	return $parts;
}
add_filter( 'document_title_parts', 'evag_service_document_title_parts' );

/**
 * Output structured data (Service + LocalBusiness + FAQPage + Breadcrumb)
 * for the current service page.
 */
function evag_service_jsonld() {
	$service = evag_current_service();
	if ( ! $service ) {
		return;
	}

	$evag      = evag_config();
	$service_url = evag_service_url( $service['slug'] );

	$areas = array();
	foreach ( $evag['areas_served'] as $area ) {
		$areas[] = array(
			'@type' => 'AdministrativeArea',
			'name'  => $area,
		);
	}

	$local_business = array(
		'@type'       => 'AutoBodyShop',
		'@id'         => home_url( '/#business' ),
		'name'        => $evag['business_name'],
		'telephone'   => $evag['phone_tel'],
		'url'         => home_url( '/' ),
		'areaServed'  => $areas,
		'priceRange'  => '$$',
	);
	if ( ! empty( $evag['hero_image'] ) ) {
		$local_business['image'] = $evag['hero_image'];
	}
	if ( ! empty( $evag['social'] ) ) {
		$local_business['sameAs'] = array_values( $evag['social'] );
	}

	$service_schema = array(
		'@context'        => 'https://schema.org',
		'@type'           => 'Service',
		'@id'             => $service_url . '#service',
		'name'            => $service['h1'],
		'serviceType'     => $service['kicker'],
		'description'     => $service['short'],
		'url'             => $service_url,
		'provider'        => $local_business,
		'areaServed'      => $areas,
		'audience'        => array(
			'@type' => 'Audience',
			'name'  => __( 'Vehicle owners in the Baltimore metro', 'evag' ),
		),
	);
	if ( ! empty( $service['image'] ) ) {
		$service_schema['image'] = $service['image'];
	}
	if ( ! empty( $service['also_known_as'] ) ) {
		$service_schema['alternateName'] = $service['also_known_as'];
	}

	echo "\n<script type=\"application/ld+json\">" . wp_json_encode( $service_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";

	// FAQ schema.
	if ( ! empty( $service['faqs'] ) ) {
		$faq_items = array();
		foreach ( $service['faqs'] as $faq ) {
			$faq_items[] = array(
				'@type'          => 'Question',
				'name'           => $faq[0],
				'acceptedAnswer' => array(
					'@type' => 'Answer',
					'text'  => $faq[1],
				),
			);
		}
		$faq_schema = array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'@id'        => $service_url . '#faq',
			'mainEntity' => $faq_items,
		);
		echo '<script type="application/ld+json">' . wp_json_encode( $faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";
	}

	// Breadcrumb schema.
	$breadcrumb = array(
		'@context'        => 'https://schema.org',
		'@type'           => 'BreadcrumbList',
		'itemListElement' => array(
			array(
				'@type'    => 'ListItem',
				'position' => 1,
				'name'     => __( 'Home', 'evag' ),
				'item'     => home_url( '/' ),
			),
			array(
				'@type'    => 'ListItem',
				'position' => 2,
				'name'     => __( 'Services', 'evag' ),
				'item'     => home_url( '/#services' ),
			),
			array(
				'@type'    => 'ListItem',
				'position' => 3,
				'name'     => $service['menu_label'],
				'item'     => $service_url,
			),
		),
	);
	echo '<script type="application/ld+json">' . wp_json_encode( $breadcrumb, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";
}
add_action( 'wp_head', 'evag_service_jsonld', 30 );
