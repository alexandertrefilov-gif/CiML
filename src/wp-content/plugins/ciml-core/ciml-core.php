<?php
/**
 * Plugin Name: CiML Core
 * Plugin URI: https://github.com/alexandertrefilov-gif/CiML
 * Description: Core logic layer for the Christus ist mein Leben portal. Phase 1 skeleton only.
 * Version: 0.1.0
 * Requires at least: 6.0
 * Requires PHP: 8.0
 * Author: CiML Project
 * Text Domain: ciml-core
 *
 * @package CiML_Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CIML_CORE_VERSION', '0.1.0' );
define( 'CIML_CORE_FILE', __FILE__ );
define( 'CIML_CORE_DIR', plugin_dir_path( __FILE__ ) );

/**
 * Load text domain and future core modules.
 */
function ciml_core_bootstrap() {
	load_plugin_textdomain( 'ciml-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'ciml_core_bootstrap' );

/**
 * Activation placeholder for future Phase 1 registration tasks.
 */
function ciml_core_activate() {
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'ciml_core_activate' );

/**
 * Deactivation placeholder.
 */
function ciml_core_deactivate() {
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'ciml_core_deactivate' );

