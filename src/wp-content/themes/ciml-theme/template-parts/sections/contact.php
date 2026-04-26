<?php
/**
 * Phase 1 static contact presentation.
 *
 * No processing, no persistence, no email sending.
 *
 * @package CiML_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="section section-alt" id="kontakt">
	<div class="container">
		<div class="section-header fade-in">
			<span class="section-label"><?php esc_html_e( 'Kontakt · Phase-1-Skeleton', 'ciml-theme' ); ?></span>
			<h2 class="section-title"><?php esc_html_e( 'Nimm Kontakt auf', 'ciml-theme' ); ?></h2>
			<p class="section-subtitle"><?php esc_html_e( 'Diese Section enthält nur statisches Markup. Es gibt keine Formularverarbeitung, keine Speicherung und keinen E-Mail-Versand.', 'ciml-theme' ); ?></p>
		</div>
		<div class="contact-panel">
			<div class="form fade-in" aria-label="<?php esc_attr_e( 'Statisches Demo-Formular', 'ciml-theme' ); ?>">
				<div class="form-row">
					<label for="ciml-demo-name"><?php esc_html_e( 'Name', 'ciml-theme' ); ?></label>
					<input id="ciml-demo-name" type="text" placeholder="<?php esc_attr_e( 'Dein Name', 'ciml-theme' ); ?>" disabled>
				</div>
				<div class="form-row">
					<label for="ciml-demo-email"><?php esc_html_e( 'E-Mail', 'ciml-theme' ); ?></label>
					<input id="ciml-demo-email" type="email" placeholder="<?php esc_attr_e( 'deine@email.de', 'ciml-theme' ); ?>" disabled>
				</div>
				<div class="form-row">
					<label for="ciml-demo-topic"><?php esc_html_e( 'Thema', 'ciml-theme' ); ?></label>
					<select id="ciml-demo-topic" disabled>
						<option><?php esc_html_e( 'Allgemeine Anfrage', 'ciml-theme' ); ?></option>
					</select>
				</div>
				<div class="form-row">
					<label for="ciml-demo-message"><?php esc_html_e( 'Nachricht', 'ciml-theme' ); ?></label>
					<textarea id="ciml-demo-message" placeholder="<?php esc_attr_e( 'Statischer Placeholder', 'ciml-theme' ); ?>" disabled></textarea>
				</div>
				<p class="legal-note"><?php esc_html_e( 'Demo-Hinweis: Vor echter Nutzung braucht diese Form Nonce, Validierung, Sanitizing, Spam-Schutz, Datenschutz-Einwilligung und klare Speicherlogik in ciml-core.', 'ciml-theme' ); ?></p>
				<button class="btn" type="button" disabled><?php esc_html_e( 'Nicht aktiv im Skeleton', 'ciml-theme' ); ?></button>
			</div>
			<aside class="card fade-in">
				<div class="card-body">
					<h3 class="card-title"><?php esc_html_e( 'Demo-Kontaktdaten', 'ciml-theme' ); ?></h3>
					<p class="card-text"><?php esc_html_e( 'Christus ist mein Leben · Königstraße 45 · 70173 Stuttgart', 'ciml-theme' ); ?></p>
					<p class="card-text"><?php esc_html_e( 'Telefon und E-Mail sind Placeholder aus dem aktiven Prototyp.', 'ciml-theme' ); ?></p>
					<span class="tag gold"><?php esc_html_e( 'Musterdaten · nicht Produktion', 'ciml-theme' ); ?></span>
				</div>
			</aside>
		</div>
	</div>
</section>
