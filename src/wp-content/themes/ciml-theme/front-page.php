<?php
/**
 * Front page template.
 *
 * This is a Phase 1 presentation skeleton. Dynamic portal data will be
 * supplied later by ciml-core; no CPT, form, role, or admin logic belongs here.
 *
 * @package CiML_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main" class="site-main">
	<section class="section phase-1-placeholder" aria-label="<?php esc_attr_e( 'Christus ist mein Leben Phase 1', 'ciml-theme' ); ?>">
		<div class="container">
			<p><?php esc_html_e( 'Phase 1 · Öffentliches Portal', 'ciml-theme' ); ?></p>
			<h1><?php esc_html_e( 'Christus ist mein Leben', 'ciml-theme' ); ?></h1>
			<p><?php esc_html_e( 'WordPress theme skeleton installed. The visual implementation will follow the approved active prototype without moving portal logic into the theme.', 'ciml-theme' ); ?></p>
		</div>
	</section>
</main>

<?php
get_footer();
