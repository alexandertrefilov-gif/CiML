<?php
/**
 * Fallback template.
 *
 * @package CiML_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="main" class="site-main">
	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			the_content();
		}
	} else {
		?>
		<section class="section">
			<div class="container">
				<h1><?php esc_html_e( 'Christus ist mein Leben', 'ciml-theme' ); ?></h1>
				<p><?php esc_html_e( 'Phase 1 presentation skeleton is installed.', 'ciml-theme' ); ?></p>
			</div>
		</section>
		<?php
	}
	?>
</main>

<?php
get_footer();

