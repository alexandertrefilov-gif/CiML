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
}
