<?php
/**
 * Phase 1 form placeholders.
 *
 * Planned future responsibility: contact form validation, sanitization, consent
 * handling, spam protection, and approved storage/routing after privacy
 * decisions are complete.
 *
 * Current status: inactive placeholder. No form processing is implemented.
 *
 * @package CiML_Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return forms module status without registering handlers.
 *
 * @return array<string, string>
 */
function ciml_core_forms_status() {
	return array(
		'module' => 'forms',
		'status' => 'placeholder_only',
	);
}
