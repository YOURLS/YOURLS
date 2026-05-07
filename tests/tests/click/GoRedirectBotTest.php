<?php

#[\PHPUnit\Framework\Attributes\Group('click')]
class GoRedirectBotTest extends PHPUnit\Framework\TestCase {

    public function test_bot_request_logs_with_is_bot_true_and_googlebot_name() {
        if ( ! yourls_keyword_is_taken( 'gobot' ) ) {
            yourls_add_new_link( 'https://example.com', 'gobot', 'bot test' );
        }
        yourls_get_db('write-test_click')->perform( 'DELETE FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = "gobot"' );

        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)';
        $_SERVER['HTTP_ACCEPT']     = 'text/html';

        yourls_log_redirect( 'gobot' );

        $row = yourls_get_db('read-test_click')->fetchObject(
            'SELECT * FROM `' . YOURLS_DB_TABLE_LOG . '` WHERE shorturl = "gobot" ORDER BY click_id DESC LIMIT 1'
        );
        $this->assertNotNull( $row );
        $meta = json_decode( $row->meta, true );
        $this->assertTrue( $meta['is_bot'] );
        $this->assertSame( 'googlebot', $meta['bot_name'] );
        $this->assertSame( 'bot', $row->device_type );
    }
}
