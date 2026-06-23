<?php
/**
 * Services config — single source of truth for service detail pages.
 * Keyed by slug so the rewrite rule maps /services/{slug}/ directly.
 *
 * @package evag
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return all services keyed by slug.
 *
 * @return array
 */
function evag_services() {
	static $services = null;

	if ( null !== $services ) {
		return $services;
	}

	$services = array(
		'windshield-replacement' => array(
			'slug'       => 'windshield-replacement',
			'menu_label' => __( 'Windshield Replacement', 'evag' ),
			'kicker'     => __( 'Windshield Replacement', 'evag' ),
			'title'      => __( 'Crack spreading fast?', 'evag' ),
			'h1'         => __( 'Mobile Windshield Replacement in Baltimore', 'evag' ),
			'short'      => __( 'Full replacement with quality glass, properly bonded, sealed and cured for safe driving.', 'evag' ),
			'meta_desc'  => __( 'Mobile windshield replacement in Baltimore, Anne Arundel, Carroll & Harford counties. OEM-quality glass, professional urethane install, safe drive-away time. Since 2003. Call (410) 900-4600.', 'evag' ),
			'image'      => 'https://ev-autoglass.com/wp-content/uploads/2023/10/AdobeStock_210571790.jpg',
			'image_alt'  => __( 'Technician replacing a vehicle windshield', 'evag' ),
			'card_type'  => 'photo',
			'also_known_as' => __( 'Auto glass replacement, windshield install, windscreen replacement', 'evag' ),
			'duration'   => __( '60–90 minutes on-site, plus safe drive-away time', 'evag' ),
			'price_note' => __( 'Pricing depends on glass type (acoustic, heated, rain-sensor, ADAS). Quotes are free and itemized — no surprises.', 'evag' ),
			'vehicles'   => __( 'Cars, SUVs, trucks and vans — domestic, import, classic and luxury.', 'evag' ),
			'highlights' => array(
				__( 'OEM-quality glass, fitted to your vehicle', 'evag' ),
				__( 'Urethane adhesive cured for a safe bond', 'evag' ),
				__( 'Cleanup, trim refit, and final inspection included', 'evag' ),
				__( 'Mobile install at your home or workplace', 'evag' ),
				__( 'ADAS recalibration handled when required', 'evag' ),
			),
			'body'       => array(
				__( 'A cracked or broken windshield is more than cosmetic — it compromises structural integrity, airbag deployment and visibility. We replace windshields with quality glass that matches the original specification for your vehicle, including acoustic, rain-sensor and heated variants where required.', 'evag' ),
				__( 'Every replacement uses a urethane adhesive system rated for full structural performance. We give you a clear, safe drive-away time before we leave so the bond is fully ready for the road.', 'evag' ),
				__( 'Extreme Vivid Auto Glass has been replacing windshields across Baltimore since 2003. Our mobile technicians come to you in Baltimore County, Anne Arundel County, Carroll County and Harford County — no shop visit, no waiting room.', 'evag' ),
			),
			'process'    => array(
				array( __( 'Identify your glass', 'evag' ), __( 'We confirm year, make, model and any features (ADAS, rain sensor, heated wiper park) so the right windshield is ordered the first time.', 'evag' ) ),
				array( __( 'Mobile install', 'evag' ),     __( 'Our tech comes to your driveway, lot or workplace, removes the broken glass, preps the pinch-weld and installs the new windshield.', 'evag' ) ),
				array( __( 'Cure & inspect', 'evag' ),     __( 'We trim, seal, clean up, and tell you exactly when the vehicle is safe to drive based on the adhesive used that day.', 'evag' ) ),
			),
			'faqs'       => array(
				array( __( 'How long does a windshield replacement take?', 'evag' ),       __( 'A typical mobile windshield replacement takes 60 to 90 minutes on-site. After that, the urethane adhesive needs cure time — your technician will give you a specific safe drive-away time for the job before they leave, usually 1 hour or more.', 'evag' ) ),
				array( __( 'Do you replace windshields with ADAS cameras?', 'evag' ),     __( 'Yes. We replace ADAS-equipped windshields (lane departure, forward collision, adaptive cruise) and handle the recalibration so the systems read the road correctly after the new glass is installed.', 'evag' ) ),
				array( __( 'Do you use OEM or aftermarket glass?', 'evag' ),              __( 'We can do either. Many vehicles do well with high-quality aftermarket glass made to OEM spec; some — especially ADAS, heads-up display, and luxury vehicles — benefit from OEM glass. We quote both options when relevant.', 'evag' ) ),
				array( __( 'Will my insurance cover a windshield replacement?', 'evag' ), __( 'Comprehensive policies often cover glass replacement, sometimes with no deductible depending on your state and carrier. We can talk you through what to expect, but coverage is ultimately between you and your insurer.', 'evag' ) ),
			),
		),

		'windshield-repair' => array(
			'slug'       => 'windshield-repair',
			'menu_label' => __( 'Windshield Chip Repair', 'evag' ),
			'kicker'     => __( 'Windshield Repair', 'evag' ),
			'title'      => __( 'Caught it early?', 'evag' ),
			'h1'         => __( 'Windshield Chip & Crack Repair', 'evag' ),
			'short'      => __( 'We stop small chips and cracks before they spread — often cheaper than a full replacement.', 'evag' ),
			'meta_desc'  => __( 'Mobile windshield chip & crack repair in Baltimore, Anne Arundel, Carroll & Harford counties. Save the windshield, stop the spread, often insurance-covered. Call (410) 900-4600.', 'evag' ),
			'image'      => 'https://ev-autoglass.com/wp-content/uploads/2023/10/cropped-IMG_3567-1.jpg',
			'image_alt'  => __( 'Close-up of windshield damage', 'evag' ),
			'card_type'  => 'photo',
			'also_known_as' => __( 'Rock chip repair, bullseye repair, star break repair, resin injection', 'evag' ),
			'duration'   => __( '30–45 minutes on-site, drive away immediately after', 'evag' ),
			'price_note' => __( 'Repairs are a fraction of the cost of a full replacement and are frequently covered with no deductible under comprehensive insurance.', 'evag' ),
			'vehicles'   => __( 'All passenger vehicles — chips up to the size of a quarter and short cracks are typically repairable.', 'evag' ),
			'highlights' => array(
				__( 'Fast resin repair — often under an hour', 'evag' ),
				__( 'Stops cracks from spreading further', 'evag' ),
				__( 'Most comprehensive policies cover repair', 'evag' ),
				__( 'Honest assessment — we tell you when repair is the right call', 'evag' ),
				__( 'Drive away as soon as the resin is cured', 'evag' ),
			),
			'body'       => array(
				__( "Caught early, a stone chip or short crack can be saved with a resin repair instead of a full replacement. The resin fills the void, restores most of the glass's structural strength, and dramatically improves the look of the damage.", 'evag' ),
				__( "Repairability depends on size, depth and location. We'll give you an honest answer — and if a repair isn't appropriate (driver's critical line of sight, deep damage, multiple impacts), we'll explain why a replacement is safer.", 'evag' ),
				__( 'We come to your driveway or workplace anywhere across the Baltimore metro — Towson, Reisterstown, Annapolis, Bel Air, Westminster and the surrounding counties.', 'evag' ),
			),
			'process'    => array(
				array( __( 'Assess the damage', 'evag' ),  __( 'We check size, depth and location to confirm a repair is the right call for safety and clarity.', 'evag' ) ),
				array( __( 'Inject the resin', 'evag' ),    __( 'Vacuum and pressure cycles draw out air, then optical-grade resin fills the chip or crack.', 'evag' ) ),
				array( __( 'Cure & polish', 'evag' ),       __( 'UV cure locks the resin, and we polish the surface flush so the damage is much less visible.', 'evag' ) ),
			),
			'faqs'       => array(
				array( __( 'Can a windshield chip really be repaired?', 'evag' ),         __( 'Yes — most chips smaller than a quarter and short cracks (typically under 6 inches) can be repaired with resin. The repair stops the damage from spreading and restores much of the glass strength.', 'evag' ) ),
				array( __( 'Will the chip be completely invisible after?', 'evag' ),      __( "A repair dramatically improves the look — but a faint outline often remains where the impact occurred. The goal of repair is structural: stopping the chip from running into a crack and saving the windshield.", 'evag' ) ),
				array( __( 'How soon should I repair a chip?', 'evag' ),                  __( "As soon as possible. Temperature changes, washing the car, and even a small bump can turn a chip into a crack. The cleaner the chip is, the better the repair.", 'evag' ) ),
				array( __( 'Is chip repair covered by insurance?', 'evag' ),              __( 'Most comprehensive auto policies cover chip repair, often with no deductible because repairing a chip is much cheaper than replacing the windshield later.', 'evag' ) ),
			),
		),

		'door-glass-replacement' => array(
			'slug'       => 'door-glass-replacement',
			'menu_label' => __( 'Door Glass Replacement', 'evag' ),
			'kicker'     => __( 'Door Glass Replacement', 'evag' ),
			'title'      => __( 'Door glass shattered?', 'evag' ),
			'h1'         => __( 'Door Glass Replacement', 'evag' ),
			'short'      => __( 'We replace door glass — clearing the broken pane, vacuuming every shard, and fitting new glass that rolls and seals right.', 'evag' ),
			'meta_desc'  => __( 'Mobile door glass replacement in Baltimore. Driver / passenger door window replacement, full shard cleanup, same-day service. Call (410) 900-4600.', 'evag' ),
			'image'      => 'https://ev-autoglass.com/wp-content/uploads/2023/10/IMG_2194-768x1024.jpg',
			'image_alt'  => __( 'Broken vehicle side and door glass', 'evag' ),
			'card_type'  => 'photo',
			'object_pos' => 'center 35%',
			'also_known_as' => __( 'Side window replacement, driver window replacement, passenger window replacement, broken car window', 'evag' ),
			'duration'   => __( '45–75 minutes on-site, drive away immediately after', 'evag' ),
			'price_note' => __( 'Most door glass is tempered safety glass and is affordable to replace. We quote a flat price after confirming year, make and trim.', 'evag' ),
			'vehicles'   => __( 'All passenger vehicles — driver, passenger, rear door, and quarter glass.', 'evag' ),
			'highlights' => array(
				__( 'Driver and passenger door glass replaced on site', 'evag' ),
				__( 'Every shard vacuumed from door cavity and interior', 'evag' ),
				__( 'Window regulator and seals checked for proper operation', 'evag' ),
				__( 'Same-day service in most cases', 'evag' ),
			),
			'body'       => array(
				__( "A broken side window leaves your vehicle open to weather and anyone walking by — so we move fast. We bring the correct glass to you, clear the cavity, vacuum every shard from the door and interior, and install the new pane.", 'evag' ),
				__( "Door glass is tempered safety glass — when it breaks, it shatters into thousands of small pieces. A proper replacement isn't just dropping in new glass; it's making sure your door rolls, locks and seals exactly like it should.", 'evag' ),
			),
			'process'    => array(
				array( __( 'Secure & clean', 'evag' ),     __( 'We clear remaining glass from the frame, vacuum the door cavity, seat and carpet thoroughly.', 'evag' ) ),
				array( __( 'Install new glass', 'evag' ),   __( 'The correct tempered glass is fitted to the regulator and seals, then tested for smooth operation.', 'evag' ) ),
				array( __( 'Verify & hand back', 'evag' ),  __( 'We roll the window through its full travel, check the seal and lock, and you’re back on the road.', 'evag' ) ),
			),
			'faqs'       => array(
				array( __( 'Can you replace door glass at my home?', 'evag' ),            __( 'Yes — door glass is one of the most common mobile jobs we do. We come to your driveway or workplace, clean the broken glass, and install the new pane on-site.', 'evag' ) ),
				array( __( 'Will my power window still work?', 'evag' ),                  __( "Yes. We refit the new glass to the existing regulator and test the full window travel before we leave. If the regulator was damaged in the break-in, we'll tell you what's needed.", 'evag' ) ),
				array( __( 'How long until I can drive away?', 'evag' ),                  __( 'Door glass uses gaskets and seals rather than urethane, so there is no cure time — you can drive immediately after the install is complete.', 'evag' ) ),
				array( __( 'Will you find all the broken glass?', 'evag' ),               __( 'We vacuum the door interior, seat, carpet and door cavity thoroughly. Shards inside the door are common — we get them out so they don’t rattle or fall later.', 'evag' ) ),
			),
		),

		'side-window-replacement' => array(
			'slug'       => 'side-window-replacement',
			'menu_label' => __( 'Side & Vent Glass', 'evag' ),
			'kicker'     => __( 'Side Window Replacement', 'evag' ),
			'title'      => __( 'Broken side window?', 'evag' ),
			'h1'         => __( 'Side & Vent Glass Replacement', 'evag' ),
			'short'      => __( "Fast replacement so your car isn't left open to the weather or anyone passing by.", 'evag' ),
			'meta_desc'  => __( 'Side and vent window replacement throughout Baltimore. Quarter glass, vent glass and side windows replaced on-site. Call (410) 900-4600.', 'evag' ),
			'image'      => 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?auto=format&fit=crop&w=1200&q=82',
			'image_alt'  => __( 'Blue sports car showing its side and quarter windows', 'evag' ),
			'card_type'  => 'photo',
			'object_pos' => 'center 42%',
			'also_known_as' => __( 'Quarter glass replacement, vent window replacement, side window glass', 'evag' ),
			'duration'   => __( '45–75 minutes on-site, drive away immediately after', 'evag' ),
			'price_note' => __( 'Quarter and vent glass varies widely by vehicle trim. We confirm pricing after we identify the exact part for your VIN.', 'evag' ),
			'vehicles'   => __( 'Cars, SUVs, trucks and vans — quarter, vent and side windows.', 'evag' ),
			'highlights' => array(
				__( 'Quarter and vent glass for most vehicles', 'evag' ),
				__( 'Thorough cleanup of broken glass', 'evag' ),
				__( 'Correct seals and trim refit', 'evag' ),
				__( 'Mobile service — we come to you', 'evag' ),
			),
			'body'       => array(
				__( "Side and vent windows take a beating from break-ins, debris and tree damage. We replace quarter glass and vent windows with the correct tempered or laminated glass for your vehicle.", 'evag' ),
				__( "Because these windows are typically tempered, they shatter when broken. We carefully remove every piece, replace the seal where needed, and fit the new glass tight against weather and wind noise.", 'evag' ),
				__( 'We service Baltimore, Reisterstown and the surrounding counties — same-day appointments available when glass is in stock.', 'evag' ),
			),
			'process'    => array(
				array( __( 'Identify the window', 'evag' ),  __( 'Quarter, vent and side windows vary by trim — we confirm the exact part for your VIN.', 'evag' ) ),
				array( __( 'Remove & clean', 'evag' ),       __( 'Old glass and debris are fully cleared from the frame and surrounding interior.', 'evag' ) ),
				array( __( 'Fit & seal', 'evag' ),           __( 'New glass is set with the correct gasket or adhesive, sealed against weather and wind.', 'evag' ) ),
			),
			'faqs'       => array(
				array( __( 'What is the difference between door glass and quarter glass?', 'evag' ), __( 'Door glass rolls up and down inside the door. Quarter glass is the smaller fixed (or hinged vent) window typically behind the rear doors or in the C-pillar area. We replace both.', 'evag' ) ),
				array( __( 'Can you replace fixed (non-rolling) side windows?', 'evag' ),         __( 'Yes — fixed quarter glass and vent windows are bonded in with urethane or set with a gasket depending on the vehicle. We handle both methods.', 'evag' ) ),
				array( __( 'How quickly can you come out?', 'evag' ),                            __( 'Often same-day or next-day for common side glass in the Baltimore metro. Less common trim windows may take 1–3 days to source.', 'evag' ) ),
			),
		),

		'stone-chip-repair' => array(
			'slug'       => 'stone-chip-repair',
			'menu_label' => __( 'Stone Chip Repair', 'evag' ),
			'kicker'     => __( 'Stone Chip Repair', 'evag' ),
			'title'      => __( 'Rock chip from the highway?', 'evag' ),
			'h1'         => __( 'Stone Chip Resin Repair', 'evag' ),
			'short'      => __( 'A quick resin repair keeps a small chip from spreading into a full windshield crack.', 'evag' ),
			'meta_desc'  => __( 'Stone chip resin repair in Baltimore. Fast, mobile, often insurance-covered. Stop a chip from turning into a windshield replacement.', 'evag' ),
			'image'      => 'https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&w=1200&q=82',
			'image_alt'  => __( 'White car with a clear front windshield in an auto workshop', 'evag' ),
			'card_type'  => 'photo',
			'object_pos' => 'center 38%',
			'also_known_as' => __( 'Rock chip repair, pit repair, bullseye, star break', 'evag' ),
			'duration'   => __( '30–45 minutes — drive away immediately', 'evag' ),
			'price_note' => __( 'Stone chip repair is much less expensive than a windshield replacement and is frequently covered with no deductible under comprehensive policies.', 'evag' ),
			'vehicles'   => __( 'All passenger vehicles — chips up to quarter-size and short surface cracks.', 'evag' ),
			'highlights' => array(
				__( 'Stops most chips from turning into cracks', 'evag' ),
				__( 'Quick on-site appointment', 'evag' ),
				__( 'Saves the cost of a full replacement', 'evag' ),
				__( 'Often covered by comprehensive insurance', 'evag' ),
			),
			'body'       => array(
				__( 'Highway stone chips are routine in Maryland — and the earlier you catch one, the better the outcome. A clean chip filled with resin within a few days of impact will typically hold for the life of the windshield.', 'evag' ),
				__( "Leave it too long and temperature changes, washing, or a pothole can run it into a crack — at which point a replacement is the only safe option.", 'evag' ),
				__( 'We come to you anywhere across Baltimore County, Anne Arundel County, Carroll County and Harford County — including I-695, I-95 and Route 50 commuters.', 'evag' ),
			),
			'process'    => array(
				array( __( 'Inspect the chip', 'evag' ),    __( "We confirm size, depth and location — and whether repair is the right call.", 'evag' ) ),
				array( __( 'Inject & fill', 'evag' ),       __( 'A resin tool draws out air and forces optical-grade resin deep into the chip.', 'evag' ) ),
				array( __( 'Cure & finish', 'evag' ),       __( 'UV light cures the resin, the surface is polished flush, and the chip is locked.', 'evag' ) ),
			),
			'faqs'       => array(
				array( __( 'How big can a stone chip be and still be repaired?', 'evag' ), __( 'Most chips up to about the size of a quarter can be repaired. Small cracks under roughly 6 inches can often be repaired too, depending on depth and location.', 'evag' ) ),
				array( __( 'Will a stone chip really spread if I ignore it?', 'evag' ),    __( 'Often, yes. Temperature swings (hot day to cold AC, cold morning to warm sun), car washes, and road bumps all stress the glass at the impact point. Many small chips run into long cracks within weeks.', 'evag' ) ),
				array( __( 'Can you repair a chip in the driver line of sight?', 'evag' ), __( "Repairs in the driver's critical view can leave a slight distortion, so a replacement may be safer in some cases. We'll assess and tell you honestly which option is right.", 'evag' ) ),
			),
		),

		'leaking-windshield-repair' => array(
			'slug'       => 'leaking-windshield-repair',
			'menu_label' => __( 'Leaking Windshield Repair', 'evag' ),
			'kicker'     => __( 'Leaking Windshield Repair', 'evag' ),
			'title'      => __( 'Water or wind getting in?', 'evag' ),
			'h1'         => __( 'Leaking Windshield Diagnosis & Re-Seal', 'evag' ),
			'short'      => __( 'We diagnose and re-seal improperly bonded glass so the cabin stays dry and quiet.', 'evag' ),
			'meta_desc'  => __( 'Diagnose and fix windshield leaks. We re-seal improperly bonded glass so water and wind stop getting in. Mobile service in Baltimore.', 'evag' ),
			'image'      => 'https://ev-autoglass.com/wp-content/uploads/2023/10/cropped-IMG_3569-1.jpg',
			'image_alt'  => __( 'Sealed windshield on a finished vehicle', 'evag' ),
			'card_type'  => 'photo',
			'also_known_as' => __( 'Windshield leak repair, water leak diagnosis, wind noise repair, windshield re-seal', 'evag' ),
			'duration'   => __( '60–90 minutes for diagnosis and re-seal; longer if a replacement is required', 'evag' ),
			'price_note' => __( "We charge for diagnosis and re-seal honestly — if a full replacement is the only safe fix, we'll explain why and quote it.", 'evag' ),
			'vehicles'   => __( 'All vehicles — particularly older cars and any vehicle with a prior windshield install.', 'evag' ),
			'highlights' => array(
				__( 'Locate water and wind leaks accurately', 'evag' ),
				__( 'Re-seal where the urethane bond has failed', 'evag' ),
				__( 'Full replacement if the bond is beyond repair', 'evag' ),
				__( 'Stop interior water damage before it spreads', 'evag' ),
			),
			'body'       => array(
				__( "Water on the floor, wind noise at speed, or a musty cabin smell often points to a failed windshield seal. Sometimes it's a previous install that wasn't bonded properly; sometimes it's age and weather.", 'evag' ),
				__( "We find the source of the leak and either re-bond the existing glass or, if the seal can't be saved, replace the windshield correctly so it stays sealed for years.", 'evag' ),
				__( 'Catching a leak early protects your headliner, dash electronics and carpet from water damage — and prevents mold from developing in the cabin.', 'evag' ),
			),
			'process'    => array(
				array( __( 'Locate the leak', 'evag' ),    __( 'Targeted testing identifies the exact source — top, side, corner or trim.', 'evag' ) ),
				array( __( 'Re-seal or replace', 'evag' ),  __( 'A localized re-seal where possible, or a full replacement if the original bond is compromised.', 'evag' ) ),
				array( __( 'Verify dry', 'evag' ),          __( 'We test again to confirm no water or wind is getting through before we leave.', 'evag' ) ),
			),
			'faqs'       => array(
				array( __( 'How can I tell if my windshield is leaking?', 'evag' ),       __( 'Common signs: water in the footwell after rain, wind noise at highway speed, fogging that takes forever to clear, or a musty smell. Any of these is worth checking.', 'evag' ) ),
				array( __( 'Can a leak be fixed without replacing the windshield?', 'evag' ), __( 'Often, yes. If the underlying urethane bond is sound and the leak is localized, we can re-seal the affected area. If the bond has widely failed, a replacement is the safer fix.', 'evag' ) ),
				array( __( 'Why does a recently-installed windshield leak?', 'evag' ),    __( 'Usually because the pinch-weld was not properly prepped, the urethane bead was incomplete, or the glass was set before the urethane was ready. We see this often on bargain installs.', 'evag' ) ),
			),
		),

		'adas-recalibration' => array(
			'slug'       => 'adas-recalibration',
			'menu_label' => __( 'ADAS Recalibration', 'evag' ),
			'kicker'     => __( 'ADAS Recalibration', 'evag' ),
			'title'      => __( 'Camera-equipped windshield?', 'evag' ),
			'h1'         => __( 'ADAS Camera & Sensor Recalibration', 'evag' ),
			'short'      => __( 'We recalibrate lane-assist and driver-assist cameras after replacement so systems read the road correctly.', 'evag' ),
			'meta_desc'  => __( 'ADAS recalibration after windshield replacement in Baltimore. Lane-assist, forward collision, adaptive cruise and driver-assist cameras calibrated to manufacturer spec.', 'evag' ),
			'image'      => 'https://images.unsplash.com/photo-1542362567-b07e54358753?auto=format&fit=crop&w=1200&q=82',
			'image_alt'  => __( 'Modern performance car with an advanced windshield and driver-assistance systems', 'evag' ),
			'card_type'  => 'photo',
			'object_pos' => 'center 45%',
			'also_known_as' => __( 'Windshield camera calibration, lane departure recalibration, forward collision calibration, ADAS reset', 'evag' ),
			'duration'   => __( 'Typically 60–90 minutes; combined static + dynamic on some vehicles can take longer', 'evag' ),
			'price_note' => __( 'ADAS calibration is quoted separately from the windshield itself because vehicle requirements vary widely. We confirm before starting.', 'evag' ),
			'vehicles'   => __( 'Most 2016+ vehicles with lane-assist, automatic emergency braking, adaptive cruise or traffic-sign recognition.', 'evag' ),
			'highlights' => array(
				__( 'Required after windshield replacement on most modern cars', 'evag' ),
				__( 'Lane departure, forward collision, adaptive cruise', 'evag' ),
				__( 'Static and dynamic calibration as your vehicle requires', 'evag' ),
				__( 'Handled as part of the install — no second appointment', 'evag' ),
			),
			'body'       => array(
				__( "Most modern vehicles mount cameras and sensors behind the windshield for driver-assist features — lane departure, automatic emergency braking, adaptive cruise, traffic-sign recognition. When the windshield comes out, those cameras lose their reference point.", 'evag' ),
				__( "We recalibrate the systems back to manufacturer spec so they read the road correctly. Depending on the vehicle, that's a static (target board) calibration, a dynamic (road) calibration, or both.", 'evag' ),
				__( 'Skipping recalibration is a real safety risk: an uncalibrated camera can misread lane markings or react late to a vehicle ahead. We treat it as a non-optional part of an ADAS windshield replacement.', 'evag' ),
			),
			'process'    => array(
				array( __( 'Identify the systems', 'evag' ), __( 'We confirm which ADAS features your vehicle has and what calibration the manufacturer requires.', 'evag' ) ),
				array( __( 'Recalibrate', 'evag' ),          __( 'Static, dynamic or combined calibration is performed with proper targets and scan tools.', 'evag' ) ),
				array( __( 'Verify codes clear', 'evag' ),    __( "We confirm no fault codes remain and the system reports ready before handover.", 'evag' ) ),
			),
			'faqs'       => array(
				array( __( 'Do I really need ADAS recalibration after a windshield replacement?', 'evag' ), __( 'If your vehicle has a windshield-mounted camera or sensor for driver-assist features, yes. The camera lost its reference point when the glass was removed and needs to be re-aimed to manufacturer spec to function safely.', 'evag' ) ),
				array( __( 'What is static vs dynamic calibration?', 'evag' ),                            __( 'Static calibration is performed in place using a specific target board at measured distances. Dynamic calibration is performed by driving the vehicle under specific conditions while a scan tool teaches the camera. Some vehicles require one, some both.', 'evag' ) ),
				array( __( 'Can you calibrate the same day as the windshield replacement?', 'evag' ),     __( 'Yes — for most vehicles we handle the calibration as part of the install so you only have one appointment.', 'evag' ) ),
			),
		),

		'rear-windshield-replacement' => array(
			'slug'       => 'rear-windshield-replacement',
			'menu_label' => __( 'Rear Windshield Replacement', 'evag' ),
			'kicker'     => __( 'Rear Windshield Replacement', 'evag' ),
			'title'      => __( 'Back glass broken?', 'evag' ),
			'h1'         => __( 'Rear Windshield & Back Glass Replacement', 'evag' ),
			'short'      => __( 'We replace rear windshields and back glass, including defroster-equipped glass, and clean up every shard.', 'evag' ),
			'meta_desc'  => __( 'Rear windshield and back glass replacement in Baltimore. Defroster-equipped and laminated glass handled. Mobile service available.', 'evag' ),
			'image'      => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=1200&q=82',
			'image_alt'  => __( 'Black sedan viewed from the rear with the back glass visible', 'evag' ),
			'card_type'  => 'photo',
			'object_pos' => 'center 42%',
			'also_known_as' => __( 'Back glass replacement, rear window replacement, hatch glass, liftgate glass', 'evag' ),
			'duration'   => __( '90 minutes on-site, plus urethane cure time on bonded rear glass', 'evag' ),
			'price_note' => __( 'Rear glass varies — tempered vs. laminated, with or without defroster, antenna or third brake light. We confirm pricing once we identify the exact part.', 'evag' ),
			'vehicles'   => __( 'Sedans, hatchbacks, SUVs, trucks (slider and fixed) and vans.', 'evag' ),
			'highlights' => array(
				__( 'Tempered and laminated rear glass options', 'evag' ),
				__( 'Defroster grid connections re-attached properly', 'evag' ),
				__( 'Full vacuum of trunk, hatch and cabin', 'evag' ),
				__( 'Trim and brake-light components handled with care', 'evag' ),
			),
			'body'       => array(
				__( "A broken back glass is a mess — most rear windshields are tempered, so they shatter into thousands of pieces all over the trunk, hatch and cabin. We replace the glass and do a complete cleanup so you're not finding shards weeks later.", 'evag' ),
				__( "Many modern back windows include a defroster grid, antenna or third brake light tied into the glass. We reconnect everything correctly so all functions work like factory.", 'evag' ),
				__( 'We come to you anywhere across the Baltimore metro — including Towson, Reisterstown, Bel Air, Annapolis, Columbia and Westminster.', 'evag' ),
			),
			'process'    => array(
				array( __( 'Cleanup first', 'evag' ),       __( "We vacuum the trunk, hatch and back-seat area thoroughly before any new glass goes in.", 'evag' ) ),
				array( __( 'Fit new back glass', 'evag' ),  __( "The correct rear windshield is bonded in, defroster and antenna reconnected, trim refit.", 'evag' ) ),
				array( __( 'Test all functions', 'evag' ),  __( "Defroster, brake light and any other glass-mounted features are verified working.", 'evag' ) ),
			),
			'faqs'       => array(
				array( __( 'Will my rear defroster still work after a replacement?', 'evag' ), __( 'Yes — we reconnect the defroster grid leads correctly and test heating before we leave.', 'evag' ) ),
				array( __( 'Will the third brake light still function?', 'evag' ),            __( 'Yes. If the brake light is integrated into the back glass, we make sure the new glass is the correct variant and is fully wired and tested.', 'evag' ) ),
				array( __( 'How long should I wait to drive after the install?', 'evag' ),    __( "Bonded rear glass uses urethane just like a windshield. Your tech will give you a specific safe drive-away time. Tempered slider glass on trucks usually has no cure time.", 'evag' ) ),
			),
		),

		'classic-luxury-glass' => array(
			'slug'       => 'classic-luxury-glass',
			'menu_label' => __( 'Classic & Luxury', 'evag' ),
			'kicker'     => __( 'Classic, Luxury & Everyday', 'evag' ),
			'title'      => __( 'Classic, luxury or daily driver?', 'evag' ),
			'h1'         => __( 'Classic, Luxury & Everyday Auto Glass', 'evag' ),
			'short'      => __( 'Careful glass replacement for classic cars, luxury vehicles, and everyday passenger cars alike — every vehicle gets the same attention.', 'evag' ),
			'meta_desc'  => __( 'Classic, luxury and everyday vehicle glass replacement in Baltimore. Careful handling for rare trim, gasket-set glass, and modern factory glass alike.', 'evag' ),
			'image'      => 'https://ev-autoglass.com/wp-content/uploads/2023/10/F681of1-portrait-scaled-2-748x1024.jpg',
			'image_alt'  => __( 'Technician carefully fitting auto glass', 'evag' ),
			'card_type'  => 'photo',
			'object_pos' => 'center 25%',
			'also_known_as' => __( 'Classic car windshield, vintage auto glass, luxury vehicle glass, exotic car windshield', 'evag' ),
			'duration'   => __( 'Variable — many classic gasket-set installs take longer than a modern bonded windshield', 'evag' ),
			'price_note' => __( 'Classic and reproduction glass varies widely in cost and availability. We quote after confirming the exact part.', 'evag' ),
			'vehicles'   => __( 'Pre-1980s American classics, European luxury, exotics, restorations and modern daily drivers.', 'evag' ),
			'highlights' => array(
				__( 'Gasket-set glass on classic vehicles', 'evag' ),
				__( 'Care with original trim, chrome and stainless', 'evag' ),
				__( 'OEM-spec glass for modern luxury cars', 'evag' ),
				__( 'Same attention whether daily driver or weekend showpiece', 'evag' ),
			),
			'body'       => array(
				__( "Classic and luxury cars deserve more care than a routine swap. Gasket-set windshields on older vehicles need the right rubber, the right install technique, and patience to set the trim properly.", 'evag' ),
				__( "Modern luxury cars need the correct glass spec — acoustic interlayer, heads-up display compatibility, heated wiper park — handled the way the factory intended. We do both with the same focus.", 'evag' ),
				__( 'We work on classics, restorations and luxury vehicles across Baltimore, Reisterstown and the surrounding counties. Some specialty parts require ordering ahead — we tell you up-front what to expect.', 'evag' ),
			),
			'process'    => array(
				array( __( 'Sourcing the right glass', 'evag' ), __( 'We track down the correct part for older or specialty vehicles, including reproduction glass when needed.', 'evag' ) ),
				array( __( 'Careful removal', 'evag' ),           __( "Original trim, gaskets and chrome are protected during removal so nothing is damaged.", 'evag' ) ),
				array( __( 'Set & finish', 'evag' ),              __( 'Glass is set with the correct method for the vehicle — gasket or urethane — and finished cleanly.', 'evag' ) ),
			),
			'faqs'       => array(
				array( __( 'Can you find glass for a 1960s or 1970s car?', 'evag' ),    __( 'Often, yes — through reproduction suppliers and specialty distributors. Lead times vary. Tell us the year, make and model and we’ll let you know what is available.', 'evag' ) ),
				array( __( 'Do you work on European luxury cars?', 'evag' ),            __( 'Yes — BMW, Mercedes-Benz, Audi, Porsche, Range Rover and others. Many of these vehicles benefit from OEM glass for HUD or acoustic interlayer correctness.', 'evag' ) ),
				array( __( 'Will the original trim and chrome survive removal?', 'evag' ), __( "That's exactly why classics get more time on the bench. We remove trim, chrome and stainless with the right tools so they can be refit without damage.", 'evag' ) ),
			),
		),
	);

	return $services;
}

/**
 * Helper — build the URL for a service slug.
 *
 * @param string $slug Service slug.
 * @return string
 */
function evag_service_url( $slug ) {
	return home_url( '/services/' . trim( $slug, '/' ) . '/' );
}
