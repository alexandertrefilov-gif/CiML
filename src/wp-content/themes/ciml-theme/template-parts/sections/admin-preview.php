<?php
/**
 * Phase 1 static admin preview.
 *
 * This is public presentation only, not a WordPress admin screen.
 *
 * @package CiML_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="section" id="admin">
	<div class="container">
		<div class="section-header fade-in">
			<span class="section-label"><?php esc_html_e( 'Admin-/Redaktionsbereich · Skeleton-Vorschau', 'ciml-theme' ); ?></span>
			<h2 class="section-title"><?php esc_html_e( 'Rückseite der Glasscheibe', 'ciml-theme' ); ?></h2>
			<p class="section-subtitle"><?php esc_html_e( 'Statische Vorschau aus dem Prototyp. Keine Admin Page, keine Rolle und keine Capability wird im Theme erstellt.', 'ciml-theme' ); ?></p>
		</div>
		<div class="admin-preview fade-in">
			<div class="admin-top">
				<strong><?php esc_html_e( 'CImL Portal · Admin Phase 1', 'ciml-theme' ); ?></strong>
				<span class="status"><?php esc_html_e( 'Demo · nicht funktional', 'ciml-theme' ); ?></span>
			</div>
			<div class="admin-body">
				<div class="admin-menu" aria-label="<?php esc_attr_e( 'Statisches Admin-Menü', 'ciml-theme' ); ?>">
					<span><?php esc_html_e( 'Übersicht', 'ciml-theme' ); ?></span>
					<span><?php esc_html_e( 'Startseite', 'ciml-theme' ); ?></span>
					<span><?php esc_html_e( 'Dienste', 'ciml-theme' ); ?></span>
					<span><?php esc_html_e( 'Kontakt', 'ciml-theme' ); ?></span>
				</div>
				<div class="admin-content">
					<div class="admin-grid">
						<div class="admin-box"><span><?php esc_html_e( 'Module', 'ciml-theme' ); ?></span><strong><?php esc_html_e( 'Skeleton', 'ciml-theme' ); ?></strong></div>
						<div class="admin-box"><span><?php esc_html_e( 'Sensible Module', 'ciml-theme' ); ?></span><strong><?php esc_html_e( '0 aktiv', 'ciml-theme' ); ?></strong></div>
						<div class="admin-box"><span><?php esc_html_e( 'Demo-Daten', 'ciml-theme' ); ?></span><strong><?php esc_html_e( 'markiert', 'ciml-theme' ); ?></strong></div>
						<div class="admin-box"><span><?php esc_html_e( 'Status', 'ciml-theme' ); ?></span><strong><?php esc_html_e( 'Präsentation', 'ciml-theme' ); ?></strong></div>
					</div>
					<div class="admin-list">
						<div><?php esc_html_e( 'Theme zeigt nur statische Vorschau.', 'ciml-theme' ); ?></div>
						<div><?php esc_html_e( 'Echte Admin-Struktur gehört später in ciml-core.', 'ciml-theme' ); ?></div>
						<div><?php esc_html_e( 'Keine vertraulichen Module im Skeleton.', 'ciml-theme' ); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
