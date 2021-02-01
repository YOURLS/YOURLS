<?php

/**
 * HTTP redirects and headers
 *
 * @group http
 */
class HTTP_Headers_Tests extends PHPUnit\Framework\TestCase {

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

    public function status_codes() {
        return array(
            array(100, 'Continue'),
            array(101, 'Switching Protocols'),
            array(102, 'Processing'),

            array(200, 'OK'),
            array(201, 'Created'),
            array(202, 'Accepted'),
            array(203, 'Non-Authoritative Information'),
            array(204, 'No Content'),
            array(205, 'Reset Content'),
            array(206, 'Partial Content'),
            array(207, 'Multi-Status'),
            array(226, 'IM Used'),

            array(300, 'Multiple Choices'),
            array(301, 'Moved Permanently'),
            array(302, 'Found'),
            array(303, 'See Other'),
            array(304, 'Not Modified'),
            array(305, 'Use Proxy'),
            array(306, 'Reserved'),
            array(307, 'Temporary Redirect'),

            array(400, 'Bad Request'),
            array(401, 'Unauthorized'),
            array(402, 'Payment Required'),
            array(403, 'Forbidden'),
            array(404, 'Not Found'),
            array(405, 'Method Not Allowed'),
            array(406, 'Not Acceptable'),
            array(407, 'Proxy Authentication Required'),
            array(408, 'Request Timeout'),
            array(409, 'Conflict'),
            array(410, 'Gone'),
            array(411, 'Length Required'),
            array(412, 'Precondition Failed'),
            array(413, 'Request Entity Too Large'),
            array(414, 'Request-URI Too Long'),
            array(415, 'Unsupported Media Type'),
            array(416, 'Requested Range Not Satisfiable'),
            array(417, 'Expectation Failed'),
            array(422, 'Unprocessable Entity'),
            array(423, 'Locked'),
            array(424, 'Failed Dependency'),
            array(426, 'Upgrade Required'),

            array(500, 'Internal Server Error'),
            array(501, 'Not Implemented'),
            array(502, 'Bad Gateway'),
            array(503, 'Service Unavailable'),
            array(504, 'Gateway Timeout'),
            array(505, 'HTTP Version Not Supported'),
            array(506, 'Variant Also Negotiates'),
            array(507, 'Insufficient Storage'),
            array(510, 'Not Extended'),
        );
    }

    /**
     * @dataProvider status_codes
     */
    public function test_get_HTTP_status($code, $status) {
        $this->assertSame(yourls_get_HTTP_status($code), $status);
    }

    public function test_get_HTTP_status_invalid() {
        $this->assertSame(yourls_get_HTTP_status(1337), '');
    }
}
