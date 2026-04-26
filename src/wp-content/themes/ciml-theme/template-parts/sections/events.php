<?php
/**
 * Phase 1 events section.
 *
 * @package CiML_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$events = array(
	array( 'day' => '08', 'month' => __( 'Mai', 'ciml-theme' ), 'title' => __( 'Willkommensabend für neue Besucher', 'ciml-theme' ), 'meta' => __( '19:00 Uhr · Gemeindesaal · Demo ohne Anmeldung', 'ciml-theme' ), 'tag' => __( 'Offen', 'ciml-theme' ) ),
	array( 'day' => '16', 'month' => __( 'Mai', 'ciml-theme' ), 'title' => __( 'Taufkurs', 'ciml-theme' ), 'meta' => __( '10:00 Uhr · Seminarraum 1 · Info-Platzhalter', 'ciml-theme' ), 'tag' => __( 'Kurs', 'ciml-theme' ) ),
	array( 'day' => '22', 'month' => __( 'Mai', 'ciml-theme' ), 'title' => __( 'Jugendabend', 'ciml-theme' ), 'meta' => __( '18:30 Uhr · Jugendraum · Demo-Daten', 'ciml-theme' ), 'tag' => __( 'Jugend', 'ciml-theme' ) ),
);
?>
<section class="section section-alt" id="events">
	<div class="container split">
		<div class="fade-in">
			<span class="section-label"><?php esc_html_e( 'Veranstaltungen · Phase-1-Skeleton', 'ciml-theme' ); ?></span>
			<h2 class="section-title"><?php esc_html_e( 'Nächste Events', 'ciml-theme' ); ?></h2>
			<p class="section-subtitle"><?php esc_html_e( 'Statische Event-Präsentation. Keine Anmeldung, keine Warteliste und keine Formularlogik.', 'ciml-theme' ); ?></p>
			<div class="events-list">
				<?php foreach ( $events as $event ) : ?>
					<article class="event-row fade-in fade-in--stagger">
						<div class="datebox">
							<strong><?php echo esc_html( $event['day'] ); ?></strong>
							<span><?php echo esc_html( $event['month'] ); ?></span>
						</div>
						<div>
							<div class="event-title"><?php echo esc_html( $event['title'] ); ?></div>
							<div class="event-sub"><?php echo esc_html( $event['meta'] ); ?></div>
						</div>
						<span class="tag green"><?php echo esc_html( $event['tag'] ); ?></span>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="split-img fade-in">
			<img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=900&amp;q=80" alt="<?php esc_attr_e( 'Gemeinde Veranstaltung', 'ciml-theme' ); ?>">
		</div>
	</div>
</section>
