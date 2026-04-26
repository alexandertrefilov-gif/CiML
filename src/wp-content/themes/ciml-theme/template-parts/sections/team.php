<?php
/**
 * Phase 1 team section.
 *
 * @package CiML_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$members = array(
	array( 'name' => __( 'Daniel Hoffmann', 'ciml-theme' ), 'role' => __( 'Leitender Pastor', 'ciml-theme' ), 'bio' => __( 'Predigt, Leitung und geistliche Ausrichtung. Demo-Profil.', 'ciml-theme' ), 'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=500&q=80' ),
	array( 'name' => __( 'Maria Hoffmann', 'ciml-theme' ), 'role' => __( 'Begleitung & Frauen', 'ciml-theme' ), 'bio' => __( 'Begleitung, Beratung und Gebet. Demo-Profil ohne sensible Funktion.', 'ciml-theme' ), 'image' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=500&q=80' ),
	array( 'name' => __( 'Markus Weber', 'ciml-theme' ), 'role' => __( 'Jugend & Jüngerschaft', 'ciml-theme' ), 'bio' => __( 'Jugendtreffen, Kurse und Mitarbeiterschulung. Demo-Profil.', 'ciml-theme' ), 'image' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=500&q=80' ),
	array( 'name' => __( 'Anna Schneider', 'ciml-theme' ), 'role' => __( 'Lobpreis & Medien', 'ciml-theme' ), 'bio' => __( 'Musikteam, Livestream und Kreativarbeit. Demo-Profil.', 'ciml-theme' ), 'image' => 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?w=500&q=80' ),
);
?>
<section class="section" id="team">
	<div class="container">
		<div class="section-header fade-in">
			<span class="section-label"><?php esc_html_e( 'Team / Leitung · Phase-1-Skeleton', 'ciml-theme' ); ?></span>
			<h2 class="section-title"><?php esc_html_e( 'Ansprechpartner', 'ciml-theme' ); ?></h2>
			<p class="section-subtitle"><?php esc_html_e( 'Öffentliche Demo-Profile aus dem Prototyp. Kontakt-Sichtbarkeit und echte Personen werden später über ciml-core geregelt.', 'ciml-theme' ); ?></p>
		</div>
		<div class="grid-4">
			<?php foreach ( $members as $member ) : ?>
				<article class="team-card fade-in">
					<div class="team-photo">
						<img src="<?php echo esc_url( $member['image'] ); ?>" alt="">
					</div>
					<div class="team-name"><?php echo esc_html( $member['name'] ); ?></div>
					<div class="team-role"><?php echo esc_html( $member['role'] ); ?></div>
					<p class="team-bio"><?php echo esc_html( $member['bio'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
