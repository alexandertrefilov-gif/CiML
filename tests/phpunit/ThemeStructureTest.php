<?php

use PHPUnit\Framework\TestCase;

final class ThemeStructureTest extends TestCase {
	private string $theme_dir;

	protected function setUp(): void {
		$this->theme_dir = CIML_TEST_ROOT . '/src/wp-content/themes/ciml-theme';
	}

	public function test_required_theme_files_exist(): void {
		$required_files = array(
			'style.css',
			'index.php',
			'functions.php',
			'header.php',
			'footer.php',
			'front-page.php',
		);

		foreach ( $required_files as $file ) {
			$this->assertFileExists(
				$this->theme_dir . '/' . $file,
				sprintf( 'Missing required theme file: %s', $file )
			);
		}
	}

	public function test_theme_header_contains_required_metadata(): void {
		$style_css = $this->theme_dir . '/style.css';

		$this->assertFileExists( $style_css );

		$contents = file_get_contents( $style_css );

		$this->assertIsString( $contents );
		$this->assertStringContainsString( 'Theme Name: CiML Theme', $contents );
		$this->assertStringContainsString( 'Text Domain: ciml-theme', $contents );
	}
}
