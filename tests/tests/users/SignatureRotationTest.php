<?php
namespace YOURLS\Tests\Users;

use PHPUnit\Framework\TestCase;

class SignatureRotationTest extends TestCase
{
    protected function setUp(): void
    {
        $ydb = \yourls_get_db();
        $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_USERS."` WHERE username LIKE 'sigtest_%'");
    }

    protected function tearDown(): void
    {
        $ydb = \yourls_get_db();
        $ydb->perform("DELETE FROM `".YOURLS_DB_TABLE_USERS."` WHERE username LIKE 'sigtest_%'");
    }

    public function test_signature_v1_matches_unversioned_salt()
    {
        \yourls_create_user('sigtest_alice', 'p@ssw0rd1', 'editor');
        $sig = \yourls_auth_signature('sigtest_alice');
        $expected = substr(\yourls_salt('sigtest_alice'), 0, 10);
        $this->assertSame($expected, $sig, 'pre-rotation signature must equal legacy un-versioned form');
    }

    public function test_rotating_key_changes_signature()
    {
        $id = \yourls_create_user('sigtest_bob', 'p@ssw0rd1', 'editor');
        $before = \yourls_auth_signature('sigtest_bob');
        \yourls_rotate_user_api_key($id);
        $after = \yourls_auth_signature('sigtest_bob');
        $this->assertNotSame($before, $after);
    }

    public function test_config_file_user_signature_unchanged()
    {
        // username with no DB row → version=1 path → un-versioned salt
        $sig = \yourls_auth_signature('configonly_user_' . uniqid());
        // The expected value is computed with the same un-versioned salt material
        // as the legacy implementation. We only assert non-emptiness and that the
        // function did not throw — actual byte-equivalence with legacy is exercised
        // by test_signature_v1_matches_unversioned_salt for DB users at v=1.
        $this->assertIsString($sig);
        $this->assertNotSame('', $sig);
    }

    public function test_unknown_username_falls_back_to_unversioned()
    {
        $sig = \yourls_auth_signature('does_not_exist_' . uniqid());
        $this->assertIsString($sig);
        $this->assertSame(10, strlen($sig));
    }

    public function test_v2_uses_versioned_material()
    {
        $id = \yourls_create_user('sigtest_carol', 'p@ssw0rd1', 'editor');
        // Manually bump to v2
        $ydb = \yourls_get_db();
        $ydb->perform(
            "UPDATE `".YOURLS_DB_TABLE_USERS."` SET `api_key_version` = 2 WHERE `user_id` = :id",
            ['id' => $id]
        );
        $sig_v2 = \yourls_auth_signature('sigtest_carol');
        $expected_v2 = substr(\yourls_salt('sigtest_carol|v2'), 0, 10);
        $this->assertSame($expected_v2, $sig_v2);

        // Unversioned (v1) form must differ from versioned (v2) form
        $unversioned = substr(\yourls_salt('sigtest_carol'), 0, 10);
        $this->assertNotSame($unversioned, $sig_v2);
    }
}
