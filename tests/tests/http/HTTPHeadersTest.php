<?php

/**
 * HTTP redirects and headers
 */
#[\PHPUnit\Framework\Attributes\Group('http')]
class HTTPHeadersTest extends PHPUnit\Framework\TestCase {

    public function todo_some_day_test_redirect() {
        // PHP headers are a bitch to test. TODO some day.
    }

    /**
     * Test that we have some javascript redirection output
     */
    public function test_javascript_redirect() {
        $regexp = '!<script type="text/javascript">\s*window.location="http://somewhere";!m';

        $this->expectOutputRegex($regexp);
        yourls_redirect_javascript('http://somewhere');
    }

    public static function status_codes(): \Iterator
    {
        yield array(100, 'Continue');
        yield array(101, 'Switching Protocols');
        yield array(102, 'Processing');
        yield array(200, 'OK');
        yield array(201, 'Created');
        yield array(202, 'Accepted');
        yield array(203, 'Non-Authoritative Information');
        yield array(204, 'No Content');
        yield array(205, 'Reset Content');
        yield array(206, 'Partial Content');
        yield array(207, 'Multi-Status');
        yield array(226, 'IM Used');
        yield array(300, 'Multiple Choices');
        yield array(301, 'Moved Permanently');
        yield array(302, 'Found');
        yield array(303, 'See Other');
        yield array(304, 'Not Modified');
        yield array(305, 'Use Proxy');
        yield array(306, 'Reserved');
        yield array(307, 'Temporary Redirect');
        yield array(400, 'Bad Request');
        yield array(401, 'Unauthorized');
        yield array(402, 'Payment Required');
        yield array(403, 'Forbidden');
        yield array(404, 'Not Found');
        yield array(405, 'Method Not Allowed');
        yield array(406, 'Not Acceptable');
        yield array(407, 'Proxy Authentication Required');
        yield array(408, 'Request Timeout');
        yield array(409, 'Conflict');
        yield array(410, 'Gone');
        yield array(411, 'Length Required');
        yield array(412, 'Precondition Failed');
        yield array(413, 'Request Entity Too Large');
        yield array(414, 'Request-URI Too Long');
        yield array(415, 'Unsupported Media Type');
        yield array(416, 'Requested Range Not Satisfiable');
        yield array(417, 'Expectation Failed');
        yield array(422, 'Unprocessable Entity');
        yield array(423, 'Locked');
        yield array(424, 'Failed Dependency');
        yield array(426, 'Upgrade Required');
        yield array(500, 'Internal Server Error');
        yield array(501, 'Not Implemented');
        yield array(502, 'Bad Gateway');
        yield array(503, 'Service Unavailable');
        yield array(504, 'Gateway Timeout');
        yield array(505, 'HTTP Version Not Supported');
        yield array(506, 'Variant Also Negotiates');
        yield array(507, 'Insufficient Storage');
        yield array(510, 'Not Extended');
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('status_codes')]
    public function test_get_HTTP_status($code, $status) {
        $this->assertSame(yourls_get_HTTP_status($code), $status);
    }

    public function test_get_HTTP_status_invalid() {
        $this->assertSame('', yourls_get_HTTP_status(1337));
    }
}
