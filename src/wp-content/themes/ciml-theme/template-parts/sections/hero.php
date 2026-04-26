<?php
/**
 * Phase 1 hero section.
 *
 * Static presentation placeholder from the active prototype. Dynamic data
 * will be supplied later by ciml-core.
 *
 * @package CiML_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="hero" aria-label="<?php esc_attr_e( 'Willkommen bei Christus ist mein Leben', 'ciml-theme' ); ?>">
	<div class="hero-bg" aria-hidden="true">
		<img src="https://images.unsplash.com/photo-1438032005730-c779502df39b?w=1920&amp;q=85" alt="">
	</div>
	<div class="hero-overlay" aria-hidden="true"></div>
	<div class="container hero-content">
		<div class="hero-inner fade-in">
			<span class="phase-pill"><?php esc_html_e( 'Phase 1 Skeleton · Öffentliches Portal', 'ciml-theme' ); ?></span>
			<p class="hero-label"><?php esc_html_e( 'Christus ist mein Leben', 'ciml-theme' ); ?></p>
			<h1><?php esc_html_e( 'Eine Gemeinde, die Menschen zu Christus führt.', 'ciml-theme' ); ?></h1>
			<p><?php esc_html_e( 'Placeholder aus dem aktiven Phase-1-Prototyp. Diese Inhalte werden später über ciml-core gepflegt.', 'ciml-theme' ); ?></p>
		</div>
	</div>
	<aside class="hero-admin-note fade-in">
		<strong><?php esc_html_e( 'Phase-1-Skeleton', 'ciml-theme' ); ?></strong>
		<p><?php esc_html_e( 'Nur Präsentation im Theme. Keine Portal-Logik, keine Admin-Funktionen und keine sensiblen Module.', 'ciml-theme' ); ?></p>
	</aside>
</section>
