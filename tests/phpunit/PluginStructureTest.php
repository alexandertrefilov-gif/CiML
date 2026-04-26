<?php

use PHPUnit\Framework\TestCase;

final class PluginStructureTest extends TestCase {
	private string $plugin_dir;

	protected function setUp(): void {
		$this->plugin_dir = CIML_TEST_ROOT . '/src/wp-content/plugins/ciml-core';
	}

	public function test_main_plugin_file_exists(): void {
		$this->assertFileExists( $this->plugin_dir . '/ciml-core.php' );
	}

	public function test_plugin_header_contains_required_metadata(): void {
		$plugin_file = $this->plugin_dir . '/ciml-core.php';

		$this->assertFileExists( $plugin_file );

		$contents = file_get_contents( $plugin_file );

		$this->assertIsString( $contents );
		$this->assertStringContainsString( 'Plugin Name: CiML Core', $contents );
		$this->assertStringContainsString( 'Text Domain: ciml-core', $contents );
	}

	public function test_bootstrap_file_exists(): void {
		$this->assertFileExists( $this->plugin_dir . '/includes/bootstrap.php' );
	}

	public function test_placeholder_files_exist(): void {
		$placeholder_files = array(
			'includes/post-types/register.php',
			'includes/taxonomies/register.php',
			'includes/options/register.php',
			'includes/admin/register.php',
			'includes/forms/register.php',
			'includes/security/register.php',
			'includes/demo-data/register.php',
			'includes/helpers/register.php',
		);

		foreach ( $placeholder_files as $file ) {
			$this->assertFileExists(
				$this->plugin_dir . '/' . $file,
				sprintf( 'Missing plugin placeholder file: %s', $file )
			);
		}
	}

	public function test_post_type_registration_function_exists(): void {
		require_once $this->plugin_dir . '/includes/post-types/register.php';

		$this->assertTrue( function_exists( 'ciml_core_register_post_types' ) );
		$this->assertTrue( function_exists( 'ciml_core_get_public_post_types' ) );
	}

	public function test_post_type_registration_is_hooked_to_init(): void {
		$contents = file_get_contents( $this->plugin_dir . '/includes/post-types/register.php' );

		$this->assertIsString( $contents );
		$this->assertMatchesRegularExpression(
			"/add_action\\(\\s*'init'\\s*,\\s*'ciml_core_register_post_types'\\s*\\)/",
			$contents
		);
	}

	public function test_allowed_public_post_type_list_contains_exactly_five_cpts(): void {
		require_once $this->plugin_dir . '/includes/post-types/register.php';

		$expected_post_types = array(
			'ciml_belief_item',
			'ciml_ministry',
			'ciml_sermon',
			'ciml_event',
			'ciml_team_member',
		);

		$actual_post_types = array_keys( ciml_core_get_public_post_types() );

		sort( $expected_post_types );
		sort( $actual_post_types );

		$this->assertSame( $expected_post_types, $actual_post_types );
	}

	public function test_contact_message_post_type_is_not_registered(): void {
		require_once $this->plugin_dir . '/includes/post-types/register.php';

		$this->assertArrayNotHasKey( 'ciml_contact_message', ciml_core_get_public_post_types() );
	}

	public function test_taxonomy_registration_function_exists(): void {
		require_once $this->plugin_dir . '/includes/taxonomies/register.php';

		$this->assertTrue( function_exists( 'ciml_core_register_taxonomies' ) );
		$this->assertTrue( function_exists( 'ciml_core_get_public_taxonomies' ) );
	}

	public function test_taxonomy_registration_is_hooked_to_init(): void {
		$contents = file_get_contents( $this->plugin_dir . '/includes/taxonomies/register.php' );

		$this->assertIsString( $contents );
		$this->assertMatchesRegularExpression(
			"/add_action\\(\\s*'init'\\s*,\\s*'ciml_core_register_taxonomies'\\s*\\)/",
			$contents
		);
	}

	public function test_allowed_public_taxonomy_list_contains_exactly_five_taxonomies(): void {
		require_once $this->plugin_dir . '/includes/taxonomies/register.php';

		$expected_taxonomies = array(
			'ciml_ministry_category',
			'ciml_sermon_series',
			'ciml_sermon_speaker',
			'ciml_event_category',
			'ciml_team_role',
		);

		$actual_taxonomies = array_keys( ciml_core_get_public_taxonomies() );

		sort( $expected_taxonomies );
		sort( $actual_taxonomies );

		$this->assertSame( $expected_taxonomies, $actual_taxonomies );
	}

	public function test_no_taxonomy_targets_contact_message_post_type(): void {
		require_once $this->plugin_dir . '/includes/taxonomies/register.php';

		foreach ( ciml_core_get_public_taxonomies() as $definition ) {
			$this->assertNotContains( 'ciml_contact_message', $definition['object_type'] );
		}
	}

	public function test_read_only_helper_public_content_list_contains_exactly_five_cpts(): void {
		require_once $this->plugin_dir . '/includes/helpers/register.php';

		$expected_post_types = array(
			'ciml_belief_item',
			'ciml_ministry',
			'ciml_sermon',
			'ciml_event',
			'ciml_team_member',
		);

		$actual_post_types = ciml_core_get_public_content_post_types();

		sort( $expected_post_types );
		sort( $actual_post_types );

		$this->assertSame( $expected_post_types, $actual_post_types );
	}

	public function test_contact_message_is_not_allowed_for_read_only_helpers(): void {
		require_once $this->plugin_dir . '/includes/helpers/register.php';

		$this->assertFalse( ciml_core_is_public_content_post_type( 'ciml_contact_message' ) );
	}

	public function test_query_args_for_allowed_public_content_are_read_only(): void {
		require_once $this->plugin_dir . '/includes/helpers/register.php';

		$args = ciml_core_get_public_content_query_args( 'ciml_sermon', 7 );

		$this->assertSame( 'ciml_sermon', $args['post_type'] );
		$this->assertSame( 'publish', $args['post_status'] );
		$this->assertSame( 7, $args['posts_per_page'] );
		$this->assertTrue( $args['no_found_rows'] );
		$this->assertTrue( $args['ignore_sticky_posts'] );
		$this->assertFalse( $args['update_post_meta_cache'] );
		$this->assertFalse( $args['update_post_term_cache'] );
		$this->assertArrayNotHasKey( 'meta_query', $args );
		$this->assertArrayNotHasKey( 'tax_query', $args );
	}

	public function test_query_args_for_forbidden_public_content_return_safe_fallback(): void {
		require_once $this->plugin_dir . '/includes/helpers/register.php';

		$this->assertSame( array(), ciml_core_get_public_content_query_args( 'ciml_contact_message' ) );
	}
}
