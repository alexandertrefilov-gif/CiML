<?php
/**
 * Phase 1 admin placeholders.
 *
 * Planned future responsibility: low-risk Phase 1 admin overview and settings
 * pages after capability and nonce rules are in place.
 *
 * Current status: inactive placeholder. No admin menus or pages are registered.
 *
 * @package CiML_Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return admin module status without registering admin pages.
 *
 * @return array<string, mixed>
 */
function ciml_core_admin_status() {
	return array(
		'module' => 'admin',
		'status' => 'placeholder_only',
		'active' => array(),
		'planned' => array(
			'overview',
			'startseite',
			'gottesdienste',
			'gemeinde',
			'glaubensgrundlage',
			'dienste',
			'predigten',
			'veranstaltungen',
			'team',
			'kontakt',
			'rechtliches',
			'spenden',
			'demo-daten',
		),
	);
}
