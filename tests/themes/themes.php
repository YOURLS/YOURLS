<?php

/**
 * Themes functions
 *
 * @group themes
 */

if( function_exists( 'yourls_activate_theme' ) ) :

class Themes_Tests extends PHPUnit_Framework_TestCase {

	/**
	 * Check that valid themes are found
	 *
	 * @since 0.1
	 */
	public function test_get_themes() {
		$themes = array_keys( yourls_get_themes() );
		$this->assertNotEmpty( $themes );

		// Pick one random theme
		$theme = $themes[ array_rand( $themes ) ];
		return dirname( $theme );
	}

	/**
	 * Check that a random valid theme activates correctly
	 *
	 * @depends test_get_themes
	 * @since 0.1
	 */
	public function test_theme_activate( $theme ) {
		$this->assertTrue( yourls_activate_theme( $theme ) );
		$this->assertTrue( yourls_load_theme( $theme ) );
		$this->assertTrue( yourls_is_style_queued( $theme ) );
		$this->assertEquals( $theme, yourls_get_active_theme() );
		return $theme;
	}
	
}

endif;
