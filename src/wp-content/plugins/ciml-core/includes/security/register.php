<?php
/**
 * Phase 1 security placeholders.
 *
 * Planned future responsibility: nonce helpers, capability checks, access
 * guards, sanitization boundaries, and validation coordination.
 *
 * Current status: inactive placeholder. No roles, capabilities, or security
 * gates are registered yet.
 *
 * @package CiML_Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return security module status for audits and future bootstrap checks.
 *
 * @return array<string, string>
 */
function ciml_core_security_status() {
	return array(
		'module' => 'security',
		'status' => 'placeholder_only',
	);
}
