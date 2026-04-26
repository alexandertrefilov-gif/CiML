<?php
/**
 * Phase 1 taxonomy placeholders.
 *
 * Planned future responsibility: Phase 1 taxonomy registration for ministry,
 * sermon, event, and team classification.
 *
 * Current status: inactive placeholder. No taxonomies are registered here.
 *
 * @package CiML_Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return planned taxonomy module status without registering taxonomies.
 *
 * @return array<string, mixed>
 */
function ciml_core_taxonomies_status() {
	return array(
		'module' => 'taxonomies',
		'status' => 'placeholder_only',
		'active' => array(),
		'planned' => array(
			'ciml_ministry_category',
			'ciml_sermon_series',
			'ciml_sermon_speaker',
			'ciml_event_category',
			'ciml_team_role',
		),
	);
}
