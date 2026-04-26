<?php
/**
 * Phase 1 ministries section.
 *
 * @package CiML_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$ministries = array(
	array( 'title' => __( 'Kinderarbeit', 'ciml-theme' ), 'text' => __( 'Sichere Betreuung, biblische Geschichten und altersgerechte Begleitung.', 'ciml-theme' ), 'image' => 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?w=700&q=80' ),
	array( 'title' => __( 'Jugend', 'ciml-theme' ), 'text' => __( 'Glaube, Freundschaft, Identität und echte Lebensfragen.', 'ciml-theme' ), 'image' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=700&q=80' ),
	array( 'title' => __( 'Musik & Lobpreis', 'ciml-theme' ), 'text' => __( 'Anbetung, Musikteam und geistliche Atmosphäre im Gottesdienst.', 'ciml-theme' ), 'image' => 'https://images.unsplash.com/photo-1516280440614-37939bbacd81?w=700&q=80' ),
	array( 'title' => __( 'Medien & Technik', 'ciml-theme' ), 'text' => __( 'Livestream, Ton, Licht, Präsentation und Online-Mediathek.', 'ciml-theme' ), 'image' => 'https://images.unsplash.com/photo-1614854262318-831574f15f1f?w=700&q=80' ),
);
?>
<section class="section section-alt" id="dienste">
	<div class="container">
		<div class="section-header fade-in">
			<span class="section-label"><?php esc_html_e( 'Dienste · Phase-1-Skeleton', 'ciml-theme' ); ?></span>
			<h2 class="section-title"><?php esc_html_e( 'Bereiche der Gemeindearbeit', 'ciml-theme' ); ?></h2>
			<p class="section-subtitle"><?php esc_html_e( 'Nur statische Präsentation. Keine Mitarbeit-Anfragen, keine Admin-Felder und keine Phase-2-Workflows.', 'ciml-theme' ); ?></p>
		</div>
		<div class="grid-4">
			<?php foreach ( $ministries as $ministry ) : ?>
				<article class="ministry-card fade-in">
					<img src="<?php echo esc_url( $ministry['image'] ); ?>" alt="">
					<div class="ministry-body">
						<h3><?php echo esc_html( $ministry['title'] ); ?></h3>
						<p><?php echo esc_html( $ministry['text'] ); ?></p>
						<span class="admin-marker"><?php esc_html_e( 'Demo · später ciml-core', 'ciml-theme' ); ?></span>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
