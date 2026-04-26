<?php
/**
 * Phase 1 community profile section.
 *
 * @package CiML_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="section section-alt" id="gemeinde">
	<div class="container split">
		<div class="split-img fade-in">
			<img src="https://images.unsplash.com/photo-1544365558-35aa4afcf11f?w=1000&amp;q=82" alt="<?php esc_attr_e( 'Gemeinschaft im Gottesdienst', 'ciml-theme' ); ?>">
		</div>
		<div class="text-block fade-in">
			<span class="section-label"><?php esc_html_e( 'Gemeindeprofil · Phase-1-Skeleton', 'ciml-theme' ); ?></span>
			<h2><?php esc_html_e( 'Glaube, Gemeinschaft und Verantwortung.', 'ciml-theme' ); ?></h2>
			<p><?php esc_html_e( 'Christus ist mein Leben ist hier als statischer Placeholder aus dem aktiven Phase-1-Prototyp angelegt.', 'ciml-theme' ); ?></p>
			<p><?php esc_html_e( 'Die spätere Datenpflege gehört in ciml-core; das Theme rendert nur die Präsentation.', 'ciml-theme' ); ?></p>
			<div class="stats" aria-label="<?php esc_attr_e( 'Phase-1-Skeleton Status', 'ciml-theme' ); ?>">
				<div class="stat"><strong><?php esc_html_e( 'Demo', 'ciml-theme' ); ?></strong><span><?php esc_html_e( 'Placeholder', 'ciml-theme' ); ?></span></div>
				<div class="stat"><strong><?php esc_html_e( 'P1', 'ciml-theme' ); ?></strong><span><?php esc_html_e( 'Theme only', 'ciml-theme' ); ?></span></div>
				<div class="stat"><strong><?php esc_html_e( '0', 'ciml-theme' ); ?></strong><span><?php esc_html_e( 'CPTs im Theme', 'ciml-theme' ); ?></span></div>
				<div class="stat"><strong><?php esc_html_e( '0', 'ciml-theme' ); ?></strong><span><?php esc_html_e( 'Future phases', 'ciml-theme' ); ?></span></div>
			</div>
		</div>
	</div>
</section>
