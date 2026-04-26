<?php
/**
 * Phase 1 demo data placeholders.
 *
 * Planned future responsibility: install, mark, and remove Phase 1 demo data
 * without overwriting production content.
 *
 * Current status: inactive placeholder. No demo data is created or deleted.
 *
 * @package CiML_Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return demo data module status without installing demo content.
 *
 * @return array<string, string>
 */
function ciml_core_demo_data_status() {
	return array(
		'module' => 'demo-data',
		'status' => 'placeholder_only',
	);
}
