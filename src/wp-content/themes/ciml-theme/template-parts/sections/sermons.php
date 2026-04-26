<?php
/**
 * Phase 1 sermons section.
 *
 * @package CiML_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sermons = array(
	array( 'title' => __( 'Leben aus Christus', 'ciml-theme' ), 'meta' => __( 'Pastor Daniel Hoffmann · 42 Min', 'ciml-theme' ), 'text' => __( 'Galater 2,20 · Serie: Identität in Christus', 'ciml-theme' ), 'image' => 'https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?w=800&q=80' ),
	array( 'title' => __( 'Wenn Glaube praktisch wird', 'ciml-theme' ), 'meta' => __( 'Markus Weber · 38 Min', 'ciml-theme' ), 'text' => __( 'Jakobus 2,14-26 · Serie: Glaube im Alltag', 'ciml-theme' ), 'image' => 'https://images.unsplash.com/photo-1507692049790-de58290a4334?w=800&q=80' ),
	array( 'title' => __( 'Die Kraft des Gebets', 'ciml-theme' ), 'meta' => __( 'Anna Schneider · 35 Min', 'ciml-theme' ), 'text' => __( 'Matthäus 6,5-13 · Serie: Leben mit Gott', 'ciml-theme' ), 'image' => 'https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=800&q=80' ),
);
?>
<section class="section" id="predigten">
	<div class="container">
		<div class="section-header fade-in">
			<span class="section-label"><?php esc_html_e( 'Mediathek · Phase-1-Skeleton', 'ciml-theme' ); ?></span>
			<h2 class="section-title"><?php esc_html_e( 'Predigten & Botschaften', 'ciml-theme' ); ?></h2>
			<p class="section-subtitle"><?php esc_html_e( 'Demo-Präsentation für externe Medienlinks. Keine lokale Medienverwaltung und keine Datenbanklogik im Theme.', 'ciml-theme' ); ?></p>
		</div>
		<div class="grid-3">
			<?php foreach ( $sermons as $sermon ) : ?>
				<article class="card sermon-card fade-in">
					<div class="card-img">
						<img src="<?php echo esc_url( $sermon['image'] ); ?>" alt="">
						<div class="play" aria-hidden="true"><span>▶</span></div>
					</div>
					<div class="card-body">
						<div class="meta"><?php echo esc_html( $sermon['meta'] ); ?></div>
						<h3 class="card-title"><?php echo esc_html( $sermon['title'] ); ?></h3>
						<p class="card-text"><?php echo esc_html( $sermon['text'] ); ?></p>
						<span class="tag blue"><?php esc_html_e( 'Demo · externer Link später', 'ciml-theme' ); ?></span>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
