<?php

/**
 * Checks config check functions
 */
#[\PHPUnit\Framework\Attributes\Group('install')]
class ConfigTest extends PHPUnit\Framework\TestCase {

    /**
     * Test (sort of) defining constants
     */
    public function test_correct_config() {
        $test = new \YOURLS\Config\Config(YOURLS_CONFIGFILE);

        // This should return a readable file
        $readable = is_readable($test->find_config());
        $this->assertTrue($readable);
        // For the record, $this->assertFileIsReadable() was introduced around PHPUnit 5.6

        // redefining YOURLS_ constants should not throw any error ("constant already defined...")
        // or define any new constants
        $consts = get_defined_constants(true);
        $before = $consts['user'];
        $test->define_core_constants();
        $consts = get_defined_constants(true);
        $after = $consts['user'];
        $this->assertSame($before,$after);
    }

    /**
     * Test incorrect config provided
     */
    public function test_incorrect_config() {
        $this->expectException(YOURLS\Exceptions\ConfigException::class);
        $this->expectExceptionMessageMatches('/User defined config not found at \'[0-9a-z]+\'/');

        $test = new \YOURLS\Config\Config(rand_str());
        $test->find_config();
    }

    /**
     * Test config not found
     */
    public function test_not_found_config() {
        $this->expectException(YOURLS\Exceptions\ConfigException::class);
        $this->expectExceptionMessage('Cannot find config.php. Please read the readme.html to learn how to install YOURLS');

        $test = new \YOURLS\Config\Config();
        $test->set_root(rand_str());
        $test->find_config();
    }

    /**
     * Missing constant triggers an exception naming it
     */
    public function test_missing_mandatory_constant() {
        $this->expectException(YOURLS\Exceptions\ConfigException::class);
        $this->expectExceptionMessageMatches('/YOURLS_NOT_DEFINED_1337/');
        (new \YOURLS\Config\Config())->check_mandatory_constants(['YOURLS_DB_USER', 'YOURLS_NOT_DEFINED_1337']);
    }

    /**
     * Defined constants pass the check
     */
    public function test_defined_mandatory_constants() {
        $this->expectNotToPerformAssertions();
        (new \YOURLS\Config\Config())->check_mandatory_constants(['YOURLS_DB_USER', 'YOURLS_SITE']);
    }

    /**
     * Unacceptable cookie key values
     *
     * @return array
     */
    public static function bad_cookie_keys(): array {
        return [
            'undefined'  => [null],
            'empty'      => [''],
            'sample'     => ['modify this text with something random'],
            'doc'        => ['qQ4KhL_pu|s@Zm7n#%:b^{A[vhm'],
            'not string' => [1337],
        ];
    }

    /**
     * @param mixed $key
     * @return void
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('bad_cookie_keys')]
    public function test_bad_cookie_key(mixed $key): void {
        $this->expectException(YOURLS\Exceptions\ConfigException::class);
        (new \YOURLS\Config\Config())->check_cookie_key($key);
    }

    /**
     * A random long string is a valid cookie key
     */
    public function test_good_cookie_key() {
        $this->expectNotToPerformAssertions();
        (new \YOURLS\Config\Config())->check_cookie_key(bin2hex(random_bytes(16)));
    }

    /**
     * Test Init actions. Not sure this is a good idea, might become cumbersome to maintain?
     */
    public function test_init_defaults() {
        $test = new \YOURLS\Config\InitDefaults();

        $expected = array (
            'include_core_funcs' => true,
            'default_timezone' => true,
            'load_default_textdomain' => true,
            'check_maintenance_mode' => true,
            'fix_request_uri' => true,
            'redirect_ssl' => true,
            'include_db' => true,
            'include_cache' => true,
            'return_if_fast_init' => true,
            'get_all_options' => true,
            'register_shutdown' => true,
            'core_loaded' => true,
            'redirect_to_install' => true,
            'check_if_upgrade_needed' => true,
            'load_plugins' => true,
            'plugins_loaded_action' => true,
            'check_new_version' => true,
            'init_admin' => true,
        );

        $actual = get_class_vars(get_class($test));

        $this->assertSame($expected, $actual);
    }

}
