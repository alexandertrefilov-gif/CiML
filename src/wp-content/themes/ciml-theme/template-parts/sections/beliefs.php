<?php
/**
 * Phase 1 beliefs section.
 *
 * @package CiML_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$beliefs = array(
	array( 'title' => __( 'Jesus Christus', 'ciml-theme' ), 'text' => __( 'Im Zentrum steht Jesus Christus: Retter, Herr und Fundament der Gemeinde.', 'ciml-theme' ), 'tag' => __( 'Demo · Glauben', 'ciml-theme' ) ),
	array( 'title' => __( 'Die Bibel', 'ciml-theme' ), 'text' => __( 'Die Bibel ist Grundlage für Lehre, Leben, Dienst und geistliche Orientierung.', 'ciml-theme' ), 'tag' => __( 'Demo · Lehre', 'ciml-theme' ) ),
	array( 'title' => __( 'Gemeinschaft', 'ciml-theme' ), 'text' => __( 'Gemeinde ist mehr als Besuch: Menschen gehen gemeinsam Schritte im Glauben.', 'ciml-theme' ), 'tag' => __( 'Demo · Leben', 'ciml-theme' ) ),
	array( 'title' => __( 'Mission', 'ciml-theme' ), 'text' => __( 'Glaube bleibt nicht innen. Die Gemeinde dient Menschen und trägt Hoffnung weiter.', 'ciml-theme' ), 'tag' => __( 'Demo · Auftrag', 'ciml-theme' ) ),
);
?>
<section class="section" id="glauben">
	<div class="container">
		<div class="section-header fade-in">
			<span class="section-label"><?php esc_html_e( 'Glaubensgrundlage · Phase-1-Skeleton', 'ciml-theme' ); ?></span>
			<h2 class="section-title"><?php esc_html_e( 'Was uns trägt', 'ciml-theme' ); ?></h2>
			<p class="section-subtitle"><?php esc_html_e( 'Statische Demo-Karten aus dem aktiven Prototyp. Später werden diese Inhalte aus ciml-core gerendert.', 'ciml-theme' ); ?></p>
		</div>
		<div class="grid-4">
			<?php foreach ( $beliefs as $belief ) : ?>
				<article class="card fade-in">
					<div class="card-body">
						<h3 class="card-title"><?php echo esc_html( $belief['title'] ); ?></h3>
						<p class="card-text"><?php echo esc_html( $belief['text'] ); ?></p>
						<span class="tag gold"><?php echo esc_html( $belief['tag'] ); ?></span>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
