<?php
/**
 * Contact Form 7 integration.
 *
 * @package evag
 */

defined( 'ABSPATH' ) || exit;

define( 'EVAG_QUOTE_FORM_TITLE', 'Auto Glass Quote' );

/**
 * Keep the quote form's authored HTML intact.
 *
 * Contact Form 7 automatically inserts paragraphs and line breaks into form
 * templates. Those extra elements become grid/flex children and break the
 * compact quote-form layout, so disable auto-formatting for this form only.
 *
 * @param bool  $autop   Whether Contact Form 7 should auto-format the content.
 * @param array $options Formatting context.
 * @return bool
 */
function evag_disable_quote_form_autop( $autop, $options ) {
	if ( 'form' !== ( $options['for'] ?? 'form' ) ) {
		return $autop;
	}

	if ( ! function_exists( 'wpcf7_get_current_contact_form' ) ) {
		return $autop;
	}

	$contact_form = wpcf7_get_current_contact_form();

	if ( $contact_form && EVAG_QUOTE_FORM_TITLE === $contact_form->title() ) {
		return false;
	}

	return $autop;
}
add_filter( 'wpcf7_autop_or_not', 'evag_disable_quote_form_autop', 10, 2 );
