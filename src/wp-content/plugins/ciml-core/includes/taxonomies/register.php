<?php
/**
 * Phase 1 public taxonomy registration.
 *
 * This file registers only public, low-risk Phase 1 classifications for the
 * already approved public CPTs. Contact submissions, meta fields, admin pages,
 * roles, forms, and demo-data flows are intentionally excluded.
 *
 * @package CiML_Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the public Phase 1 taxonomy definitions.
 *
 * @return array<string, mixed>
 */
function ciml_core_get_public_taxonomies() {
	return array(
		'ciml_ministry_category' => array(
			'object_type' => array( 'ciml_ministry' ),
			'labels'      => array(
				'name'          => 'Dienst-Kategorien',
				'singular_name' => 'Dienst-Kategorie',
				'add_new_item'  => 'Dienst-Kategorie hinzufügen',
				'edit_item'     => 'Dienst-Kategorie bearbeiten',
			),
			'args'        => array(
				'description'       => 'Phase 1 public ministry classification.',
				'public'            => true,
				'show_in_rest'      => true,
				'hierarchical'      => true,
				'show_admin_column' => true,
				'rewrite'           => false,
			),
		),
		'ciml_sermon_series'     => array(
			'object_type' => array( 'ciml_sermon' ),
			'labels'      => array(
				'name'          => 'Predigtserien',
				'singular_name' => 'Predigtserie',
				'add_new_item'  => 'Predigtserie hinzufügen',
				'edit_item'     => 'Predigtserie bearbeiten',
			),
			'args'        => array(
				'description'       => 'Phase 1 public sermon series classification.',
				'public'            => true,
				'show_in_rest'      => true,
				'hierarchical'      => false,
				'show_admin_column' => true,
				'rewrite'           => false,
			),
		),
		'ciml_sermon_speaker'    => array(
			'object_type' => array( 'ciml_sermon' ),
			'labels'      => array(
				'name'          => 'Prediger',
				'singular_name' => 'Prediger',
				'add_new_item'  => 'Prediger hinzufügen',
				'edit_item'     => 'Prediger bearbeiten',
			),
			'args'        => array(
				'description'       => 'Phase 1 public sermon speaker classification.',
				'public'            => true,
				'show_in_rest'      => true,
				'hierarchical'      => false,
				'show_admin_column' => true,
				'rewrite'           => false,
			),
		),
		'ciml_event_category'    => array(
			'object_type' => array( 'ciml_event' ),
			'labels'      => array(
				'name'          => 'Veranstaltungs-Kategorien',
				'singular_name' => 'Veranstaltungs-Kategorie',
				'add_new_item'  => 'Veranstaltungs-Kategorie hinzufügen',
				'edit_item'     => 'Veranstaltungs-Kategorie bearbeiten',
			),
			'args'        => array(
				'description'       => 'Phase 1 public event classification without signup workflows.',
				'public'            => true,
				'show_in_rest'      => true,
				'hierarchical'      => true,
				'show_admin_column' => true,
				'rewrite'           => false,
			),
		),
		'ciml_team_role'         => array(
			'object_type' => array( 'ciml_team_member' ),
			'labels'      => array(
				'name'          => 'Team-Rollen',
				'singular_name' => 'Team-Rolle',
				'add_new_item'  => 'Team-Rolle hinzufügen',
				'edit_item'     => 'Team-Rolle bearbeiten',
			),
			'args'        => array(
				'description'       => 'Phase 1 public team role classification.',
				'public'            => true,
				'show_in_rest'      => true,
				'hierarchical'      => true,
				'show_admin_column' => true,
				'rewrite'           => false,
			),
		),
	);
}

/**
 * Register the approved public Phase 1 taxonomies.
 *
 * @return void
 */
function ciml_core_register_taxonomies() {
	foreach ( ciml_core_get_public_taxonomies() as $taxonomy => $definition ) {
		$args = array_merge(
			$definition['args'],
			array(
				'labels' => $definition['labels'],
			)
		);

		register_taxonomy( $taxonomy, $definition['object_type'], $args );
	}
}
add_action( 'init', 'ciml_core_register_taxonomies' );

/**
 * Return current taxonomy module status.
 *
 * @return array<string, mixed>
 */
function ciml_core_taxonomies_status() {
	return array(
		'module' => 'taxonomies',
		'status' => 'public_taxonomies_registered',
		'active' => array_keys( ciml_core_get_public_taxonomies() ),
	);
}
