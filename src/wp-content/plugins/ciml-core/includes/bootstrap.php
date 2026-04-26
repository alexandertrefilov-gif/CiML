<?php
/**
 * Phase 1 plugin foundation loader.
 *
 * Loads placeholder modules only. These files document planned Phase 1
 * responsibilities but do not register CPTs, taxonomies, roles, admin pages,
 * forms, or demo data yet.
 *
 * @package CiML_Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load a plugin foundation file when it exists.
 *
 * @param string $relative_path Path relative to the plugin includes directory.
 * @return void
 */
function ciml_core_load_foundation_file( $relative_path ) {
	$file = CIML_CORE_INCLUDES_DIR . ltrim( $relative_path, '/' );

	if ( file_exists( $file ) ) {
		require_once $file;
	}
}

ciml_core_load_foundation_file( 'helpers/register.php' );
ciml_core_load_foundation_file( 'security/register.php' );
ciml_core_load_foundation_file( 'post-types/register.php' );
ciml_core_load_foundation_file( 'taxonomies/register.php' );
ciml_core_load_foundation_file( 'options/register.php' );
ciml_core_load_foundation_file( 'admin/register.php' );
ciml_core_load_foundation_file( 'forms/register.php' );
ciml_core_load_foundation_file( 'demo-data/register.php' );
