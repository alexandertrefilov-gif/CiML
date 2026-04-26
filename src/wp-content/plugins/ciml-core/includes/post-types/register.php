<?php
/**
 * Phase 1 post type placeholders.
 *
 * Planned future responsibility: Phase 1 public-content CPT registration for
 * beliefs, ministries, sermons, events, team members, and approved contact
 * storage only after the security and privacy decisions are complete.
 *
 * Current status: inactive placeholder. No CPTs are registered here.
 *
 * @package CiML_Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return planned post type module status without registering post types.
 *
 * @return array<string, mixed>
 */
function ciml_core_post_types_status() {
	return array(
		'module' => 'post-types',
		'status' => 'placeholder_only',
		'active' => array(),
		'planned' => array(
			'ciml_belief_item',
			'ciml_ministry',
			'ciml_sermon',
			'ciml_event',
			'ciml_team_member',
			'ciml_contact_message',
		),
	);
}
