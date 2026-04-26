<?php
/**
 * Phase 1 read-only public content helpers.
 *
 * These helpers expose configuration and safe query arguments for the approved
 * public Phase 1 CPTs only. They do not execute database queries or register
 * hooks.
 *
 * @package CiML_Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the public Phase 1 content CPTs allowed for read-only helpers.
 *
 * @return string[]
 */
function ciml_core_get_public_content_post_types() {
	return array(
		'ciml_belief_item',
		'ciml_ministry',
		'ciml_sermon',
		'ciml_event',
		'ciml_team_member',
	);
}

/**
 * Check whether a post type is approved for public content helper usage.
 *
 * @param string $post_type Post type name.
 * @return bool
 */
function ciml_core_is_public_content_post_type( $post_type ) {
	return in_array( $post_type, ciml_core_get_public_content_post_types(), true );
}

/**
 * Build conservative read-only query arguments for approved public content.
 *
 * This function intentionally returns arguments only. It does not execute
 * WP_Query, get_posts, or any other database operation.
 *
 * @param string $post_type Post type name.
 * @param int    $limit     Maximum posts per page.
 * @return array<string, mixed>
 */
function ciml_core_get_public_content_query_args( $post_type, $limit = 10 ) {
	if ( ! ciml_core_is_public_content_post_type( $post_type ) ) {
		return array();
	}

	$limit = absint( $limit );

	if ( 1 > $limit ) {
		$limit = 10;
	}

	return array(
		'post_type'              => $post_type,
		'post_status'            => 'publish',
		'posts_per_page'         => min( $limit, 50 ),
		'orderby'                => 'menu_order title',
		'order'                  => 'ASC',
		'no_found_rows'          => true,
		'ignore_sticky_posts'    => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
	);
}

/**
 * Return helper module status for audits and bootstrap checks.
 *
 * @return array<string, string>
 */
function ciml_core_helpers_status() {
	return array(
		'module' => 'helpers',
		'status' => 'read_only_public_content_helpers',
	);
}
