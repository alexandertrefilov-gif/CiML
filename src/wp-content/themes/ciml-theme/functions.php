<?php
/**
 * CiML Theme bootstrap.
 *
 * Presentation layer only. Portal logic belongs in the ciml-core plugin.
 *
 * @package CiML_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CIML_THEME_VERSION', '0.1.0' );

/**
 * Register theme supports and frontend assets.
 */
function ciml_theme_setup() {
	load_theme_textdomain( 'ciml-theme', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Navigation', 'ciml-theme' ),
			'footer'  => __( 'Footer Navigation', 'ciml-theme' ),
		)
	);
}
add_action( 'after_setup_theme', 'ciml_theme_setup' );

/**
 * Enqueue Phase 1 presentation assets.
 */
function ciml_theme_enqueue_assets() {
	wp_enqueue_style(
		'ciml-theme-style',
		get_stylesheet_uri(),
		array(),
		CIML_THEME_VERSION
	);

	wp_enqueue_style(
		'ciml-theme-main',
		get_template_directory_uri() . '/assets/css/main.css',
		array( 'ciml-theme-style' ),
		CIML_THEME_VERSION
	);

	wp_enqueue_script(
		'ciml-theme-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		CIML_THEME_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'ciml_theme_enqueue_assets' );
