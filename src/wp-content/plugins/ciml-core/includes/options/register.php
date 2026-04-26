<?php
/**
 * Phase 1 option placeholders.
 *
 * Planned future responsibility: option groups for public homepage content,
 * service information, community profile, contact information, legal status,
 * donation information, and demo-data status.
 *
 * Current status: inactive placeholder. No settings, option groups, or admin
 * fields are registered here.
 *
 * @package CiML_Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return options module status without registering settings.
 *
 * @return array<string, mixed>
 */
function ciml_core_options_status() {
	return array(
		'module' => 'options',
		'status' => 'placeholder_only',
		'active' => array(),
		'planned' => array(
			'homepage',
			'first_visit',
			'services',
			'community_profile',
			'contact',
			'legal',
			'donation',
			'demo_data',
		),
	);
}
