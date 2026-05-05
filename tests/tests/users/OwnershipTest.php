<?php
namespace YOURLS\Tests\Users;

use PHPUnit\Framework\TestCase;

class OwnershipTest extends TestCase
{
    private $user_id;

    protected function setUp(): void
    {
        $ydb = \yourls_get_db();
        $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_USERS."` WHERE username = 'owntest_alice'");
        $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_URL."` WHERE keyword LIKE 'own_%' OR keyword LIKE 'ownkw%'");
        $this->user_id = \yourls_create_user('owntest_alice', 'p@ssw0rd1', 'editor');

        // Force the cached current-user row to be 'owntest_alice' for this test.
        // We can't redefine YOURLS_USER (it's a const), but we can prime the row cache
        // by hooking the user_can filter — only needed for capability tests, not insert.
        // For insert ownership, we directly assert created_by from the resulting row.
    }

    protected function tearDown(): void
    {
        $ydb = \yourls_get_db();
        $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_URL."` WHERE keyword LIKE 'own_%' OR keyword LIKE 'ownkw%'");
        $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_USERS."` WHERE username LIKE 'owntest_%'");
    }

    public function test_insert_link_in_db_records_created_by_when_passed()
    {
        // Direct call to the lower-level function with explicit owner
        $ok = \yourls_insert_link_in_db('https://example.com/'.uniqid(), 'own_kw_direct', 'title', '', $this->user_id);
        $this->assertTrue((bool) $ok);

        $ydb = \yourls_get_db();
        $owner = $ydb->fetchValue(
            "SELECT created_by FROM `".YOURLS_DB_TABLE_URL."` WHERE keyword = :k",
            ['k' => 'own_kw_direct']
        );
        $this->assertSame((int) $this->user_id, (int) $owner);
    }

    public function test_insert_link_in_db_with_null_owner_is_unowned()
    {
        $ok = \yourls_insert_link_in_db('https://example.com/'.uniqid(), 'own_kw_null', 'title', '', null);
        $this->assertTrue((bool) $ok);

        $ydb = \yourls_get_db();
        $owner = $ydb->fetchValue(
            "SELECT created_by FROM `".YOURLS_DB_TABLE_URL."` WHERE keyword = :k",
            ['k' => 'own_kw_null']
        );
        $this->assertNull($owner);
    }

    public function test_user_owns_keyword_helper()
    {
        \yourls_insert_link_in_db('https://example.com/'.uniqid(), 'own_kw_helper', 'title', '', $this->user_id);
        $this->assertTrue(\yourls_user_owns_keyword($this->user_id, 'own_kw_helper'));
        $this->assertFalse(\yourls_user_owns_keyword(999999, 'own_kw_helper'));
    }

    public function test_user_owns_keyword_false_for_unowned()
    {
        \yourls_insert_link_in_db('https://example.com/'.uniqid(), 'own_kw_unowned', 'title', '', null);
        $this->assertFalse(\yourls_user_owns_keyword($this->user_id, 'own_kw_unowned'));
    }

    public function test_add_new_link_records_created_by_for_logged_in_user()
    {
        // YOURLS_USER may already be defined by the bootstrap to a config-file user.
        // The current_user_row cache uses a static; force a re-resolve so we get the
        // real row for whoever is "logged in" in this test process.
        \yourls_current_user_row(true);
        $expected_owner = \yourls_current_user_id(); // null for config-file users

        $r = \yourls_add_new_link('https://example.com/'.uniqid(), 'ownkwaddnew', 'title');
        $this->assertSame('success', $r['status'], 'add_new_link must succeed');

        $ydb = \yourls_get_db();
        $owner = $ydb->fetchValue(
            "SELECT created_by FROM `".YOURLS_DB_TABLE_URL."` WHERE keyword = :k",
            ['k' => 'ownkwaddnew']
        );
        if ($expected_owner === null) {
            $this->assertNull($owner, 'config-file user produces NULL created_by');
        } else {
            $this->assertSame((int) $expected_owner, (int) $owner);
        }
    }
}
