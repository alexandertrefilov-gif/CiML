<?php
/**
 * Phase 1 public-content post type registration.
 *
 * This file registers only the public, low-risk Phase 1 content models allowed
 * by decision 0004. Contact submissions, forms, taxonomies, roles, admin pages,
 * and demo-data flows are intentionally excluded.
 *
 * @package CiML_Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the public Phase 1 CPT definitions approved for first Core
 * implementation.
 *
 * @return array<string, mixed>
 */
function ciml_core_get_public_post_types() {
	return array(
		'ciml_belief_item' => array(
			'labels' => array(
				'name'          => 'Glaubensgrundlagen',
				'singular_name' => 'Glaubensgrundlage',
				'add_new_item'  => 'Glaubensgrundlage hinzufügen',
				'edit_item'     => 'Glaubensgrundlage bearbeiten',
			),
			'args'   => array(
				'description'         => 'Phase 1 public belief cards.',
				'public'              => true,
				'show_in_rest'        => true,
				'has_archive'         => false,
				'exclude_from_search' => true,
				'menu_icon'           => 'dashicons-book-alt',
				'supports'            => array( 'title', 'editor', 'page-attributes' ),
			),
		),
		'ciml_ministry'    => array(
			'labels' => array(
				'name'          => 'Dienste',
				'singular_name' => 'Dienst',
				'add_new_item'  => 'Dienst hinzufügen',
				'edit_item'     => 'Dienst bearbeiten',
			),
			'args'   => array(
				'description'         => 'Phase 1 public ministry cards.',
				'public'              => true,
				'show_in_rest'        => true,
				'has_archive'         => false,
				'exclude_from_search' => false,
				'menu_icon'           => 'dashicons-groups',
				'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
			),
		),
		'ciml_sermon'      => array(
			'labels' => array(
				'name'          => 'Predigten',
				'singular_name' => 'Predigt',
				'add_new_item'  => 'Predigt hinzufügen',
				'edit_item'     => 'Predigt bearbeiten',
			),
			'args'   => array(
				'description'         => 'Phase 1 public sermon and media links.',
				'public'              => true,
				'show_in_rest'        => true,
				'has_archive'         => false,
				'exclude_from_search' => false,
				'menu_icon'           => 'dashicons-format-audio',
				'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
			),
		),
		'ciml_event'       => array(
			'labels' => array(
				'name'          => 'Veranstaltungen',
				'singular_name' => 'Veranstaltung',
				'add_new_item'  => 'Veranstaltung hinzufügen',
				'edit_item'     => 'Veranstaltung bearbeiten',
			),
			'args'   => array(
				'description'         => 'Phase 1 public event listings without signup workflows.',
				'public'              => true,
				'show_in_rest'        => true,
				'has_archive'         => false,
				'exclude_from_search' => false,
				'menu_icon'           => 'dashicons-calendar-alt',
				'supports'            => array( 'title', 'editor', 'excerpt', 'page-attributes' ),
			),
		),
		'ciml_team_member' => array(
			'labels' => array(
				'name'          => 'Team',
				'singular_name' => 'Teammitglied',
				'add_new_item'  => 'Teammitglied hinzufügen',
				'edit_item'     => 'Teammitglied bearbeiten',
			),
			'args'   => array(
				'description'         => 'Phase 1 public team profiles.',
				'public'              => true,
				'show_in_rest'        => true,
				'has_archive'         => false,
				'exclude_from_search' => true,
				'menu_icon'           => 'dashicons-id',
				'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
			),
		),
	);
}

/**
 * Register the approved public Phase 1 CPTs.
 *
 * @return void
 */
function ciml_core_register_post_types() {
	foreach ( ciml_core_get_public_post_types() as $post_type => $definition ) {
		$args = array_merge(
			$definition['args'],
			array(
				'labels' => $definition['labels'],
			)
		);

		register_post_type( $post_type, $args );
	}
}
add_action( 'init', 'ciml_core_register_post_types' );

/**
 * Return current post type module status.
 *
 * @return array<string, mixed>
 */
function ciml_core_post_types_status() {
	return array(
		'module' => 'post-types',
		'status' => 'public_cpts_registered',
		'active' => array_keys( ciml_core_get_public_post_types() ),
	);
}
