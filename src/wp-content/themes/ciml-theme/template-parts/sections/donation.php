<?php
/**
 * Phase 1 donation info section.
 *
 * @package CiML_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="section cta" id="spenden">
	<div class="container">
		<span class="section-label"><?php esc_html_e( 'Spenden-Infoblock · Phase-1-Skeleton', 'ciml-theme' ); ?></span>
		<h2><?php esc_html_e( 'Gemeinsam Gemeinde bauen.', 'ciml-theme' ); ?></h2>
		<p><?php esc_html_e( 'Statischer Demo-Block aus dem aktiven Prototyp. In Phase 1 wird keine Zahlungsabwicklung gebaut und es werden keine produktiven Bankdaten versprochen.', 'ciml-theme' ); ?></p>
		<div class="btn-row" aria-label="<?php esc_attr_e( 'Demo Links', 'ciml-theme' ); ?>">
			<a class="btn btn-outline-light" href="#kontakt"><?php esc_html_e( 'Spendeninfo statisch anzeigen', 'ciml-theme' ); ?></a>
			<a class="btn btn-outline-light" href="#rechtliches"><?php esc_html_e( 'Rechtliche Hinweise prüfen', 'ciml-theme' ); ?></a>
		</div>
	</div>
</section>
