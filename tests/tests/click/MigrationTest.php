<?php

/**
 * Click tracking schema migration (DB version 510).
 */
#[\PHPUnit\Framework\Attributes\Group('click')]
#[\PHPUnit\Framework\Attributes\Group('click-migration')]
class ClickMigrationTest extends PHPUnit\Framework\TestCase {

    public function test_upgrade_to_510_adds_all_new_columns_and_is_idempotent() {
        require_once YOURLS_INC . '/functions-upgrade.php';

        ob_start(); yourls_upgrade_to_510(); ob_end_clean();
        ob_start(); yourls_upgrade_to_510(); ob_end_clean();

        $ydb = yourls_get_db('read-test_click');
        $cols = array_column(
            (array) $ydb->fetchObjects( 'SHOW COLUMNS FROM `' . YOURLS_DB_TABLE_LOG . '`' ),
            'Field'
        );

        foreach ( ['device_type','browser','os','referrer_host','utm_source','utm_medium','utm_campaign','city','region','visitor_hash','click_uid','meta'] as $expected ) {
            $this->assertContains( $expected, $cols, "log table is missing `$expected`" );
        }

        $idx = array_column(
            (array) $ydb->fetchObjects( 'SHOW INDEX FROM `' . YOURLS_DB_TABLE_LOG . '`' ),
            'Key_name'
        );
        foreach ( ['device_type_idx','utm_source_idx','click_uid_idx'] as $expected ) {
            $this->assertContains( $expected, $idx, "log table is missing index `$expected`" );
        }
    }
}
