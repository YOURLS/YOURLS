<?php

namespace stats;
use PHPUnit;

/**
 * Tests for yourls_show_referrers()
 */
#[\PHPUnit\Framework\Attributes\Group('stats')]
#[\PHPUnit\Framework\Attributes\Group('referrer')]
class ShowReferrersTest extends PHPUnit\Framework\TestCase
{

    protected function tearDown(): void {
        yourls_remove_all_filters('statistics_show_referrers');
        yourls_remove_all_filters('is_private');
        yourls_remove_all_filters('shunt_is_valid_user');
    }

    /**
     * yourls_show_referrers() always returns a boolean
     */
    public function test_show_referrers_is_bool() {
        yourls_add_filter('shunt_is_valid_user', 'yourls_return_false');

        $this->assertIsBool(yourls_show_referrers());
    }

    /**
     * Referrers shown on a private install, or to a logged in user, and hidden from an anon visitor of a public install
     *
     * Each scenario checks both the value the function returns and the default value the filter receives
     */
    public static function referrers_scenarios(): \Iterator {
        yield 'private'           => ['yourls_return_true', 'yourls_return_false', true];
        yield 'public, logged in' => ['yourls_return_false', 'yourls_return_true', true];
        yield 'public, anonymous' => ['yourls_return_false', 'yourls_return_false', false];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('referrers_scenarios')]
    public function test_show_referrers_default_value($is_private, $is_valid_user, $expected) {
        $filtered = null;

        yourls_add_filter('is_private', $is_private);
        yourls_add_filter('shunt_is_valid_user', $is_valid_user);
        yourls_add_filter('statistics_show_referrers', function ($show) use (&$filtered) {
            $filtered = $show;
            return $show;
        });

        $this->assertSame($expected, yourls_show_referrers());
        $this->assertSame($expected, $filtered);
    }

    /**
     * Same as above, with what yourls_is_valid_user() actually returns when the visitor is not logged in:
     * a string error message (which is truthy, but not boolean true).
     */
    public function test_show_referrers_when_public_and_login_failed() {
        yourls_add_filter('is_private', 'yourls_return_false');
        yourls_add_filter('shunt_is_valid_user', function ($shunt) {
            return 'Please log in';
        });

        $this->assertFalse(yourls_show_referrers());
    }

    /**
     * The 'statistics_show_referrers' filter forces the result to true
     */
    public function test_show_referrers_filter_can_force_true() {
        yourls_add_filter('is_private', 'yourls_return_false');
        yourls_add_filter('shunt_is_valid_user', 'yourls_return_false');
        yourls_add_filter('statistics_show_referrers', 'yourls_return_true');

        $this->assertTrue(yourls_show_referrers());
    }

    /**
     * The 'statistics_show_referrers' filter forces the result to false, even on a private install
     */
    public function test_show_referrers_filter_can_force_false() {
        yourls_add_filter('is_private', 'yourls_return_true');
        yourls_add_filter('statistics_show_referrers', 'yourls_return_false');

        $this->assertFalse(yourls_show_referrers());
    }

}
