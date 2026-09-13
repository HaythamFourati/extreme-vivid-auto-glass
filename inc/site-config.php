<?php
/**
 * Centralised site config — single source of truth for business info, copy and asset URLs
 * referenced across template-parts.
 *
 * @package evag
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return the site-wide configuration array.
 *
 * @return array
 */
function evag_config() {
	static $config = null;

	if ( null !== $config ) {
		return $config;
	}

	$config = array(
		'business_name'  => __( 'Extreme Vivid Auto Glass', 'evag' ),
		'tagline'        => __( 'Mobile auto glass repair & windshield replacement in Baltimore — we come to you.', 'evag' ),
		'meta_desc'      => __( 'Mobile auto glass service across Baltimore, Anne Arundel, Carroll & Harford counties. Windshield replacement, chip repair, door glass & ADAS recalibration — we come to you. Since 2003. Call (410) 900-4600.', 'evag' ),
		'phone_display'  => '(410) 900-4600',
		'phone_tel'      => '+1-410-900-4600',
		'phone_tel_href' => '+14109004600',
		'hero_image'     => 'https://ev-autoglass.com/wp-content/uploads/2023/10/81DB5400-ECB6-4E5F-BEF9-DE1D6BB4D924_edited2.jpg',
		'van_image'      => 'https://ev-autoglass.com/wp-content/uploads/2023/10/81DB5400-ECB6-4E5F-BEF9-DE1D6BB4D924_edited1-1024x514.jpg',
		'reviews_count'  => 131,
		'reviews_link'   => 'https://www.google.com/search?q=Extreme+Vivid+Auto+Glass&kgmid=/g/11rd859lz0',
		'social'         => array(
			'https://www.google.com/search?q=Extreme+Vivid+Auto+Glass&kgmid=/g/11rd859lz0',
		),

		'areas_served'   => array(
			'Baltimore County MD',
			'Anne Arundel County MD',
			'Carroll County MD',
			'Harford County MD',
			'Baltimore MD',
			'Reisterstown MD',
		),

		'service_areas'  => array(
			__( 'Baltimore County', 'evag' ),
			__( 'Anne Arundel County', 'evag' ),
			__( 'Carroll County', 'evag' ),
			__( 'Harford County', 'evag' ),
			__( 'Baltimore · Reisterstown', 'evag' ),
		),

		'glass_options'  => array(
			array( 'value' => 'Front windshield',                  'code' => 'WS-01', 'label' => __( 'Front Windshield', 'evag' ) ),
			array( 'value' => 'Front driver side door glass',     'code' => 'DR-02', 'label' => __( 'Front Driver Door', 'evag' ) ),
			array( 'value' => 'Front passenger side door glass',  'code' => 'DR-03', 'label' => __( 'Front Passenger Door', 'evag' ) ),
			array( 'value' => 'Rear driver side door glass',      'code' => 'DR-04', 'label' => __( 'Rear Driver Door', 'evag' ) ),
			array( 'value' => 'Rear passenger side door glass',   'code' => 'DR-05', 'label' => __( 'Rear Passenger Door', 'evag' ) ),
			array( 'value' => 'Quarter / vent glass',             'code' => 'QV-06', 'label' => __( 'Quarter / Vent', 'evag' ) ),
			array( 'value' => 'Back glass',                       'code' => 'BK-07', 'label' => __( 'Back Glass', 'evag' ) ),
			array( 'value' => 'Stone chip',                       'code' => 'CH-08', 'label' => __( 'Stone Chip', 'evag' ) ),
			array( 'value' => 'Leak',                             'code' => 'LK-09', 'label' => __( 'Leak / Seal', 'evag' ) ),
			array( 'value' => 'ADAS windshield',                  'code' => 'AD-10', 'label' => __( 'ADAS Windshield', 'evag' ) ),
		),

		'reviews'        => array(
			array( 'name' => 'Marcus T.',   'initial' => 'M', 'color' => '#E01627', 'meta' => __( '2 weeks ago · Windshield replacement', 'evag' ), 'text' => __( '“Cracked windshield on my Accord and they came right to my driveway in Towson. Fast, professional, and the new glass looks factory. Couldn’t ask for better service.”', 'evag' ) ),
			array( 'name' => 'Danielle R.', 'initial' => 'D', 'color' => '#1E7FA6', 'meta' => __( '3 weeks ago · Chip repair', 'evag' ),            'text' => __( '“Rock chip from I-695 that I caught early. They fit me in quickly and the repair stopped it from spreading. Honest about what I actually needed — no upsell.”', 'evag' ) ),
			array( 'name' => 'Kevin S.',    'initial' => 'K', 'color' => '#2F8F4E', 'meta' => __( '1 month ago · ADAS windshield', 'evag' ),         'text' => __( '“My car needed the lane-assist camera recalibrated after the windshield. They handled the whole thing and everything works perfectly. Very knowledgeable crew.”', 'evag' ) ),
			array( 'name' => 'Alicia M.',   'initial' => 'A', 'color' => '#7A5AF8', 'meta' => __( '1 month ago · Door glass replacement', 'evag' ),  'text' => __( '“Someone broke my driver’s window overnight. They replaced the glass at my office parking lot the next day and cleaned up every bit of it. Lifesaver.”', 'evag' ) ),
			array( 'name' => 'Robert P.',   'initial' => 'R', 'color' => '#D9821B', 'meta' => __( '2 months ago · Windshield replacement', 'evag' ), 'text' => __( '“Quoted me a fair price — noticeably less than the big chains — and showed up on time. Quick, courteous, and the install was spotless. Highly recommend.”', 'evag' ) ),
			array( 'name' => 'Jasmine W.',  'initial' => 'J', 'color' => '#0E8C8C', 'meta' => __( '2 months ago · Mobile service', 'evag' ),         'text' => __( '“The convenience of them coming to me made this painless. Great communication from the quote to the finished job. Professional from start to finish.”', 'evag' ) ),
			array( 'name' => 'Tom B.',      'initial' => 'T', 'color' => '#C0392B', 'meta' => __( '3 months ago · Auto glass replacement', 'evag' ), 'text' => __( '“Second time using Extreme Vivid and they’re consistent. Prompt response, quality glass, and they stand behind the work. My go-to in Baltimore County.”', 'evag' ) ),
		),
	);

	return $config;
}

/**
 * Homepage FAQ — shared between the visible accordion and FAQPage JSON-LD.
 *
 * @return array<array{0:string,1:string}>
 */
function evag_faqs() {
	return array(
		array( __( 'Do you come to my home or work?', 'evag' ),                       __( "Yes — that's the whole idea. We bring the equipment to wherever your vehicle is safely parked, including home driveways, workplace lots and fleet sites.", 'evag' ) ),
		array( __( 'Can a chip be repaired instead of replaced?', 'evag' ),           __( "Often, yes — if a chip or small crack is caught early and isn't in the driver's critical line of sight, a resin repair can stop it from spreading and save a full replacement.", 'evag' ) ),
		array( __( 'Do I need ADAS recalibration after replacement?', 'evag' ),       __( "If your vehicle has cameras or sensors mounted at the windshield for driver-assist features, it likely needs recalibration after a replacement. We'll let you know and handle it as part of the job.", 'evag' ) ),
		array( __( 'Can you replace broken side windows?', 'evag' ),                  __( 'Yes. We replace door glass, side and vent windows, and back glass — and we clean up the broken glass so your vehicle is safe to use again.', 'evag' ) ),
		array( __( 'What do you need for a quote?', 'evag' ),                         __( "Your vehicle year, make and model, which glass is damaged, and your ZIP code. A VIN speeds up exact glass matching but isn't required to get started.", 'evag' ) ),
		array( __( 'Do you help with insurance?', 'evag' ),                           __( "Many comprehensive policies may cover glass work. Coverage varies, so we'll help you understand the process and confirm pricing before we begin.", 'evag' ) ),
		array( __( 'What areas do you serve?', 'evag' ),                              __( "Baltimore County, Anne Arundel County, Carroll County and Harford County, plus Baltimore, Reisterstown and surrounding areas. Send your ZIP and we'll confirm.", 'evag' ) ),
		array( __( 'How soon can I drive after a replacement?', 'evag' ),             __( 'The adhesive needs time to cure for a safe bond. Your technician will give you a safe drive-away time for your specific job before they leave.', 'evag' ) ),
	);
}
