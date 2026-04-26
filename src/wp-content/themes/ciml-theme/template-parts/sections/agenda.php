<?php
/**
 * Phase 1 agenda section.
 *
 * @package CiML_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$steps = array(
	array( 'label' => __( 'Jetzt', 'ciml-theme' ), 'title' => __( 'Theme-Skeleton', 'ciml-theme' ), 'text' => __( 'Öffentliche Sections als statische Präsentation sichtbar.', 'ciml-theme' ) ),
	array( 'label' => __( 'Nächster Schritt', 'ciml-theme' ), 'title' => __( 'Core-Struktur', 'ciml-theme' ), 'text' => __( 'CPTs, Optionen und Admin-Menü später im Plugin.', 'ciml-theme' ) ),
	array( 'label' => __( 'Prüfung', 'ciml-theme' ), 'title' => __( 'QA Phase 1', 'ciml-theme' ), 'text' => __( 'Responsive, Sicherheit, Demo-Daten und Form-Grenzen prüfen.', 'ciml-theme' ) ),
	array( 'label' => __( 'Gate', 'ciml-theme' ), 'title' => __( 'Keine Produktion', 'ciml-theme' ), 'text' => __( 'Livegang erst nach echten Daten, Rechtstexten und QA.', 'ciml-theme' ) ),
	array( 'label' => __( 'Danach', 'ciml-theme' ), 'title' => __( 'Phase 2 separat', 'ciml-theme' ), 'text' => __( 'Weitere Module erst nach Phase-1-Abnahme.', 'ciml-theme' ) ),
);
?>
<section class="section section-alt" id="agenda">
	<div class="container">
		<div class="section-header fade-in">
			<span class="section-label"><?php esc_html_e( 'Agenda · Phase-1-Skeleton', 'ciml-theme' ); ?></span>
			<h2 class="section-title"><?php esc_html_e( 'Wo wir in Phase 1 stehen', 'ciml-theme' ); ?></h2>
			<p class="section-subtitle"><?php esc_html_e( 'Diese Agenda ist statische Orientierung im Theme, keine Projektsteuerung und keine Admin-Funktion.', 'ciml-theme' ); ?></p>
		</div>
		<div class="roadmap">
			<?php foreach ( $steps as $step ) : ?>
				<article class="roadmap-step fade-in">
					<span><?php echo esc_html( $step['label'] ); ?></span>
					<strong><?php echo esc_html( $step['title'] ); ?></strong>
					<p><?php echo esc_html( $step['text'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
