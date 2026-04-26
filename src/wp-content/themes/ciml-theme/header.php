<?php
/**
 * Site header.
 *
 * @package CiML_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip" href="#main"><?php esc_html_e( 'Zum Inhalt springen', 'ciml-theme' ); ?></a>
<header class="site-header">
	<div class="hdr">
		<a class="logo-wrap" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<span class="logo-text">
				<strong><?php bloginfo( 'name' ); ?></strong>
				<span><?php esc_html_e( 'Gemeindeportal', 'ciml-theme' ); ?></span>
			</span>
		</a>
		<nav aria-label="<?php esc_attr_e( 'Hauptnavigation', 'ciml-theme' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>
	</div>
</header>

