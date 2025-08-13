<?php

/**
 * Pages
 */
#[\PHPUnit\Framework\Attributes\Group('pages')]
class PagesTest extends PHPUnit\Framework\TestCase {

    public function test_page_is_reserved() {
        $this->assertTrue( yourls_keyword_is_reserved('examplepage') );
    }

    public function test_examplepage() {
        $this->assertTrue(yourls_is_page('examplepage'));
    }

    public function test_no_page() {
        $this->assertFalse(yourls_is_page(rand_str()));
    }

    public function test_create_page_and_check_is_reserved() {
        $page = rand_str();
        if( touch(YOURLS_PAGEDIR . "/$page.php") ) {
            $this->assertTrue( yourls_keyword_is_reserved($page) );
            $this->assertTrue( yourls_is_page($page) );
            unlink(YOURLS_PAGEDIR . "/$page.php");
        } else {
            $this->markTestSkipped( "Cannot create 'pages/$page'" );
        }
    }

}
