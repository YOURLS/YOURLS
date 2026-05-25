<?php

/**
 * Pages
 */
#[\PHPUnit\Framework\Attributes\Group('pages')]
class PagesTest extends PHPUnit\Framework\TestCase {

    /**
     * @dataProvider invalidPageProvider
     */
    public function test_invalid_page_values($invalid) {
        // These should be considered reserved keywords
        $this->assertTrue( yourls_keyword_is_reserved($invalid) );
        // These should not be considered valid pages
        $this->assertFalse( yourls_is_page($invalid) );
    }

    /**
     * @dataProvider invalidPageProvider
     */
    public function test_yourls_page_rejects_invalid($invalid) {
        // yourls_page() should die with a 404 for invalid/attack values
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Not found');
        yourls_page($invalid);
    }

    public static function invalidPageProvider() {
        return [
            ['..'],
            ['.'],
            ['../../attack'],
            ['../../../attack'],
            ['..%2F..%2F..%2Fattack'],
            ['..//..//attack'],
            ['..\\..\\attack'],
            ['..\\..\\..\\attack'],
        ];
    }

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
