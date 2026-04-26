<?php
/**
 * Phase 1 service bar section.
 *
 * @package CiML_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = array(
	array( 'label' => __( 'Sonntag', 'ciml-theme' ), 'value' => __( '10:30 Uhr', 'ciml-theme' ) ),
	array( 'label' => __( 'Adresse Demo', 'ciml-theme' ), 'value' => __( 'Königstraße 45 · Stuttgart', 'ciml-theme' ) ),
	array( 'label' => __( 'Sprache', 'ciml-theme' ), 'value' => __( 'Deutsch · Übersetzung vorbereitet', 'ciml-theme' ) ),
	array( 'label' => __( 'Livestream', 'ciml-theme' ), 'value' => __( 'YouTube vorbereitet', 'ciml-theme' ) ),
);
?>
<section class="info-bar" id="gottesdienste" aria-label="<?php esc_attr_e( 'Schnellinformationen', 'ciml-theme' ); ?>">
	<div class="container info-grid">
		<?php foreach ( $items as $item ) : ?>
			<div class="info-item fade-in">
				<div class="info-label"><?php echo esc_html( $item['label'] ); ?></div>
				<div class="info-value"><?php echo esc_html( $item['value'] ); ?></div>
			</div>
		<?php endforeach; ?>
	</div>
</section>
