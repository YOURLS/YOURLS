<?php

/**
 * Pages
 *
 * @group pages
 */

class Pages_Tests extends PHPUnit_Framework_TestCase {

    public function test_page_is_reserved() {
        $this->assertTrue( yourls_keyword_is_reserved('examplepage') );
    }

    public function test_create_page_and_check_is_reserved() {
        $page = rand_str();
        if( touch(YOURLS_PAGEDIR . "/$page.php") ) {
            $this->assertTrue( yourls_keyword_is_reserved($page) );
            unlink(YOURLS_PAGEDIR . "/$page.php");
        } else {
            $this->markTestSkipped( "Cannot create 'pages/$page'" );
        }
    }

}
