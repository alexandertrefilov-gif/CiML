<?php
/**
 * Minimal PHPUnit bootstrap for Phase 1 skeleton structure tests.
 *
 * These stubs are intentionally small and exist only so future bootstrap
 * smoke tests can include skeleton files without a full WordPress runtime.
 */

define( 'CIML_TEST_ROOT', dirname( __DIR__ ) );

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', CIML_TEST_ROOT . '/wordpress/' );
}

if ( ! function_exists( 'plugin_dir_path' ) ) {
	function plugin_dir_path( $file ) {
		return rtrim( dirname( $file ), '/\\' ) . DIRECTORY_SEPARATOR;
	}
}

if ( ! function_exists( 'plugin_basename' ) ) {
	function plugin_basename( $file ) {
		return basename( dirname( $file ) ) . '/' . basename( $file );
	}
}

if ( ! function_exists( 'add_action' ) ) {
	function add_action( $hook_name, $callback ) {
		return true;
	}
}

if ( ! function_exists( 'register_activation_hook' ) ) {
	function register_activation_hook( $file, $callback ) {
		return true;
	}
}

if ( ! function_exists( 'register_deactivation_hook' ) ) {
	function register_deactivation_hook( $file, $callback ) {
		return true;
	}
}

if ( ! function_exists( 'load_plugin_textdomain' ) ) {
	function load_plugin_textdomain( $domain, $deprecated = false, $plugin_rel_path = false ) {
		return true;
	}
}

if ( ! function_exists( 'flush_rewrite_rules' ) ) {
	function flush_rewrite_rules() {
		return true;
	}
}
