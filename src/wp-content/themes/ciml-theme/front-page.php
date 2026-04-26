<?php
/**
 * Front page template.
 *
 * This is a Phase 1 presentation skeleton. Dynamic portal data will be
 * supplied later by ciml-core; no CPT, form, role, or admin logic belongs here.
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
	get_template_part( 'template-parts/sections/hero' );
	get_template_part( 'template-parts/sections/service-bar' );
	get_template_part( 'template-parts/sections/first-visit' );
	get_template_part( 'template-parts/sections/community-profile' );
	?>
</main>

<?php
get_footer();
