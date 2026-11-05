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

/**
 * Populate the "Damaged glass" dropdown from the theme's glass_options.
 *
 * The homepage damage tiles pre-select this dropdown by exact value, so the
 * option list and evag_config()['glass_options'] have to agree character for
 * character. Rather than maintain the same list in two places — the theme and
 * the form stored in the database — the authored form-tag only declares its
 * placeholder and the options are injected here.
 *
 * Contact Form 7 builds both the rendered <option> list and its server-side
 * `enum` validation rule from scanned form-tags, so filtering the tag keeps
 * markup and validation in sync. The tag is matched on its evag-glass-select
 * class so this stays scoped to our field in every scanning context, including
 * submission validation where no "current" form is set.
 *
 * @param array $scanned_tag Form-tag properties, pre-WPCF7_FormTag.
 * @return array
 */
function evag_populate_glass_options( $scanned_tag ) {
	$options = (array) ( $scanned_tag['options'] ?? array() );

	if ( 'select' !== ( $scanned_tag['basetype'] ?? '' ) || ! in_array( 'class:evag-glass-select', $options, true ) ) {
		return $scanned_tag;
	}

	$values = wp_list_pluck( evag_config()['glass_options'], 'value' );

	// first_as_label turns the first value into the empty placeholder option.
	if ( in_array( 'first_as_label', $options, true ) ) {
		$placeholder = $scanned_tag['values'][0] ?? __( 'Select glass type…', 'evag' );
		array_unshift( $values, $placeholder );
	}

	$scanned_tag['raw_values'] = $values;
	$scanned_tag['values']     = $values;
	$scanned_tag['labels']     = $values;

	if ( WPCF7_USE_PIPE ) {
		$scanned_tag['pipes'] = new WPCF7_Pipes( $values );
	}

	return $scanned_tag;
}
add_filter( 'wpcf7_form_tag', 'evag_populate_glass_options' );

/**
 * Reply to the customer, not the site's wordpress@ sender.
 *
 * A "Reply-To: [email]" line in the Mail tab trips Contact Form 7's
 * "Invalid mailbox syntax" error because the email field is optional. Adding
 * the header here, only when a valid address was submitted, keeps the field
 * optional and the form free of configuration errors. Leave the Mail tab's
 * Additional headers empty.
 *
 * @param array             $components Mail components.
 * @param WPCF7_ContactForm $contact_form Contact form.
 * @param WPCF7_Mail        $mail Mail template being sent.
 * @return array
 */
function evag_quote_reply_to_customer( $components, $contact_form, $mail ) {
	if ( EVAG_QUOTE_FORM_TITLE !== $contact_form->title() || 'mail' !== $mail->name() ) {
		return $components;
	}

	$submission = WPCF7_Submission::get_instance();
	$email      = $submission ? is_email( trim( (string) $submission->get_posted_data( 'email' ) ) ) : false;

	if ( $email ) {
		$components['additional_headers'] = trim( $components['additional_headers'] . "\nReply-To: " . $email );
	}

	return $components;
}
add_filter( 'wpcf7_mail_components', 'evag_quote_reply_to_customer', 10, 3 );
