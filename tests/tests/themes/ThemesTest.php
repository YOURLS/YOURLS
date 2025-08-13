<?php

/**
 * Themes functions
 *
 * @group themes
 */
#[\PHPUnit\Framework\Attributes\RequiresFunction('yourls_activate_theme')]
class ThemesTest extends \PHPUnit\Framework\TestCase {

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
     * @since 0.1
     */
    #[\PHPUnit\Framework\Attributes\Depends('test_get_themes')]
    public function test_theme_activate( $theme ) {
		$this->assertTrue( yourls_activate_theme( $theme ) );
		$this->assertTrue( yourls_load_theme( $theme ) );
		$this->assertTrue( yourls_is_style_queued( $theme ) );
		$this->assertEquals( $theme, yourls_get_active_theme() );
		return $theme;
	}
}
