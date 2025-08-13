<?php

/**
 * This abstract class isn't supposed to be run as tests
 * See login_*.php files
 */
abstract class AbstractLoginTestCase extends PHPUnit\Framework\TestCase {

    protected $backup_request;

    protected function setUp(): void {
        $this->backup_request = $_REQUEST;
        $_REQUEST['nonce'] = yourls_create_nonce('admin_login');
    }

    protected function tearDown(): void {
        $_REQUEST = $this->backup_request;
        yourls_remove_all_actions('pre_yourls_die');
    }

}
