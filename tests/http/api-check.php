<?php

/**
 * HTTP functions related to api.yourls.org
 *
 * @group http
 * @since 0.1
 */
class HTTP_AYO_Tests extends PHPUnit_Framework_TestCase {
    
    /**
     * Check that version checking happens only when visiting the admin area
     *
     * @since 0.1
     */
    public function test_check_only_in_admin() {
        yourls_add_filter( 'is_admin', 'yourls_return_false' );
        $this->assertFalse( yourls_maybe_check_core_version() );
        yourls_remove_filter( 'is_admin', 'yourls_return_false' );
    }

}
