<?php

/*
 * This file is part of composer/ca-bundle.
 *
 * (c) Composer <https://github.com/composer>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Composer\CaBundle;

use Psr\Log\LoggerInterface;
use Symfony\Component\Process\PhpProcess;

/**
 * @author Chris Smith <chris@cs278.org>
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
class CaBundle
{
    /** @var string|null */
    private static $caPath;
    /** @var array<string, bool> */
    private static $caFileValidity = array();
    /** @var bool|null */
    private static $useOpensslParse;

    /**
     * Returns the system CA bundle path, or a path to the bundled one
     *
     * This method was adapted from Sslurp.
     * https://github.com/EvanDotPro/Sslurp
     *
     * (c) Evan Coury <me@evancoury.com>
     *
     * For the full copyright and license information, please see below:
     *
     * Copyright (c) 2013, Evan Coury
     * All rights reserved.
     *
     * Redistribution and use in source and binary forms, with or without modification,
     * are permitted provided that the following conditions are met:
     *
     *     * Redistributions of source code must retain the above copyright notice,
     *       this list of conditions and the following disclaimer.
     *
     *     * Redistributions in binary form must reproduce the above copyright notice,
     *       this list of conditions and the following disclaimer in the documentation
     *       and/or other materials provided with the distribution.
     *
     * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
     * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
     * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
     * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
     * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
     * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
     * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
     * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
     * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
     * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
     *
     * @param  LoggerInterface $logger optional logger for information about which CA files were loaded
     * @return string          path to a CA bundle file or directory
     */
    public static function getSystemCaRootBundlePath(LoggerInterface $logger = null)
    {
        if (self::$caPath !== null) {
            return self::$caPath;
        }
        $caBundlePaths = array();

        // If SSL_CERT_FILE env variable points to a valid certificate/bundle, use that.
        // This mimics how OpenSSL uses the SSL_CERT_FILE env variable.
        $caBundlePaths[] = self::getEnvVariable('SSL_CERT_FILE');

        // If SSL_CERT_DIR env variable points to a valid certificate/bundle, use that.
        // This mimics how OpenSSL uses the SSL_CERT_FILE env variable.
        $caBundlePaths[] = self::getEnvVariable('SSL_CERT_DIR');

        $caBundlePaths[] = ini_get('openssl.cafile');
        $caBundlePaths[] = ini_get('openssl.capath');

        $otherLocations = array(
            '/etc/pki/tls/certs/ca-bundle.crt', // Fedora, RHEL, CentOS (ca-certificates package)
            '/etc/ssl/certs/ca-certificates.crt', // Debian, Ubuntu, Gentoo, Arch Linux (ca-certificates package)
            '/etc/ssl/ca-bundle.pem', // SUSE, openSUSE (ca-certificates package)
            '/usr/local/share/certs/ca-root-nss.crt', // FreeBSD (ca_root_nss_package)
            '/usr/ssl/certs/ca-bundle.crt', // Cygwin
            '/opt/local/share/curl/curl-ca-bundle.crt', // OS X macports, curl-ca-bundle package
            '/usr/local/share/curl/curl-ca-bundle.crt', // Default cURL CA bunde path (without --with-ca-bundle option)
            '/usr/share/ssl/certs/ca-bundle.crt', // Really old RedHat?
            '/etc/ssl/cert.pem', // OpenBSD
            '/usr/local/etc/ssl/cert.pem', // FreeBSD 10.x
            '/usr/local/etc/openssl/cert.pem', // OS X homebrew, openssl package
            '/usr/local/etc/openssl@1.1/cert.pem', // OS X homebrew, openssl@1.1 package
        );

        foreach($otherLocations as $location) {
            $otherLocations[] = dirname($location);
        }

        $caBundlePaths = array_merge($caBundlePaths, $otherLocations);

        foreach ($caBundlePaths as $caBundle) {
            if ($caBundle && self::caFileUsable($caBundle, $logger)) {
                return self::$caPath = $caBundle;
            }

            if ($caBundle && self::caDirUsable($caBundle)) {
                return self::$caPath = $caBundle;
            }
        }

        return self::$caPath = static::getBundledCaBundlePath(); // Bundled CA file, last resort
    }

    /**
     * Returns the path to the bundled CA file
     *
     * In case you don't want to trust the user or the system, you can use this directly
     *
     * @return string path to a CA bundle file
     */
    public static function getBundledCaBundlePath()
    {
        $caBundleFile = __DIR__.'/../res/cacert.pem';

        // cURL does not understand 'phar://' paths
        // see https://github.com/composer/ca-bundle/issues/10
        if (0 === strpos($caBundleFile, 'phar://')) {
            $tempCaBundleFile = tempnam(sys_get_temp_dir(), 'openssl-ca-bundle-');
            if (false === $tempCaBundleFile) {
                throw new \RuntimeException('Could not create a temporary file to store the bundled CA file');
            }

            file_put_contents(
                $tempCaBundleFile,
                file_get_contents($caBundleFile)
            );

            register_shutdown_function(function() use ($tempCaBundleFile) {
                @unlink($tempCaBundleFile);
            });

            $caBundleFile = $tempCaBundleFile;
        }

        return $caBundleFile;
    }

    /**
     * Validates a CA file using opensl_x509_parse only if it is safe to use
     *
     * @param string          $filename
     * @param LoggerInterface $logger   optional logger for information about which CA files were loaded
     *
     * @return bool
     */
    public static function validateCaFile($filename, LoggerInterface $logger = null)
    {
        static $warned = false;

        if (isset(self::$caFileValidity[$filename])) {
            return self::$caFileValidity[$filename];
        }

        $contents = file_get_contents($filename);

        // assume the CA is valid if php is vulnerable to
        // https://www.sektioneins.de/advisories/advisory-012013-php-openssl_x509_parse-memory-corruption-vulnerability.html
        if (!static::isOpensslParseSafe()) {
            if (!$warned && $logger) {
                $logger->warning(sprintf(
                    'Your version of PHP, %s, is affected by CVE-2013-6420 and cannot safely perform certificate validation, we strongly suggest you upgrade.',
                    PHP_VERSION
                ));
                $warned = true;
            }

            $isValid = !empty($contents);
        } elseif (is_string($contents) && strlen($contents) > 0) {
            $contents = preg_replace("/^(\\-+(?:BEGIN|END))\\s+TRUSTED\\s+(CERTIFICATE\\-+)\$/m", '$1 $2', $contents);
            if (null === $contents) {
                // regex extraction failed
                $isValid = false;
            } else {
                $isValid = (bool) openssl_x509_parse($contents);
            }
        } else {
            $isValid = false;
        }

        if ($logger) {
            $logger->debug('Checked CA file '.realpath($filename).': '.($isValid ? 'valid' : 'invalid'));
        }

        return self::$caFileValidity[$filename] = $isValid;
    }

    /**
     * Test if it is safe to use the PHP function openssl_x509_parse().
     *
     * This checks if OpenSSL extensions is vulnerable to remote code execution
     * via the exploit documented as CVE-2013-6420.
     *
     * @return bool
     */
    public static function isOpensslParseSafe()
    {
        if (null !== self::$useOpensslParse) {
            return self::$useOpensslParse;
        }

        if (PHP_VERSION_ID >= 50600) {
            return self::$useOpensslParse = true;
        }

        // Vulnerable:
        // PHP 5.3.0 - PHP 5.3.27
        // PHP 5.4.0 - PHP 5.4.22
        // PHP 5.5.0 - PHP 5.5.6
        if (
               (PHP_VERSION_ID < 50400 && PHP_VERSION_ID >= 50328)
            || (PHP_VERSION_ID < 50500 && PHP_VERSION_ID >= 50423)
            || PHP_VERSION_ID >= 50507
        ) {
            // This version of PHP has the fix for CVE-2013-6420 applied.
            return self::$useOpensslParse = true;
        }

        if (defined('PHP_WINDOWS_VERSION_BUILD')) {
            // Windows is probably insecure in this case.
            return self::$useOpensslParse = false;
        }

        $compareDistroVersionPrefix = function ($prefix, $fixedVersion) {
            $regex = '{^'.preg_quote($prefix).'([0-9]+)$}';

            if (preg_match($regex, PHP_VERSION, $m)) {
                return ((int) $m[1]) >= $fixedVersion;
            }

            return false;
        };

        // Hard coded list of PHP distributions with the fix backported.
        if (
            $compareDistroVersionPrefix('5.3.3-7+squeeze', 18) // Debian 6 (Squeeze)
            || $compareDistroVersionPrefix('5.4.4-14+deb7u', 7) // Debian 7 (Wheezy)
            || $compareDistroVersionPrefix('5.3.10-1ubuntu3.', 9) // Ubuntu 12.04 (Precise)
        ) {
            return self::$useOpensslParse = true;
        }

        // Symfony Process component is missing so we assume it is unsafe at this point
        if (!class_exists('Symfony\Component\Process\PhpProcess')) {
            return self::$useOpensslParse = false;
        }

        // This is where things get crazy, because distros backport security
        // fixes the chances are on NIX systems the fix has been applied but
        // it's not possible to verify that from the PHP version.
        //
        // To verify exec a new PHP process and run the issue testcase with
        // known safe input that replicates the bug.

        // Based on testcase in https://github.com/php/php-src/commit/c1224573c773b6845e83505f717fbf820fc18415
        // changes in https://github.com/php/php-src/commit/76a7fd893b7d6101300cc656058704a73254d593
        $cert = 'LS0tLS1CRUdJTiBDRVJUSUZJQ0FURS0tLS0tCk1JSUVwRENDQTR5Z0F3SUJBZ0lKQUp6dThyNnU2ZUJjTUEwR0NTcUdTSWIzRFFFQkJRVUFNSUhETVFzd0NRWUQKVlFRR0V3SkVSVEVjTUJvR0ExVUVDQXdUVG05eVpISm9aV2x1TFZkbGMzUm1ZV3hsYmpFUU1BNEdBMVVFQnd3SApTOE9Ed3Jac2JqRVVNQklHQTFVRUNnd0xVMlZyZEdsdmJrVnBibk14SHpBZEJnTlZCQXNNRmsxaGJHbGphVzkxCmN5QkRaWEowSUZObFkzUnBiMjR4SVRBZkJnTlZCQU1NR0cxaGJHbGphVzkxY3k1elpXdDBhVzl1WldsdWN5NWsKWlRFcU1DZ0dDU3FHU0liM0RRRUpBUlliYzNSbFptRnVMbVZ6YzJWeVFITmxhM1JwYjI1bGFXNXpMbVJsTUhVWQpaREU1TnpBd01UQXhNREF3TURBd1dnQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBCkFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUEKQUFBQUFBQVhEVEUwTVRFeU9ERXhNemt6TlZvd2djTXhDekFKQmdOVkJBWVRBa1JGTVJ3d0dnWURWUVFJREJOTwpiM0prY21obGFXNHRWMlZ6ZEdaaGJHVnVNUkF3RGdZRFZRUUhEQWRMdzRQQ3RteHVNUlF3RWdZRFZRUUtEQXRUClpXdDBhVzl1UldsdWN6RWZNQjBHQTFVRUN3d1dUV0ZzYVdOcGIzVnpJRU5sY25RZ1UyVmpkR2x2YmpFaE1COEcKQTFVRUF3d1liV0ZzYVdOcGIzVnpMbk5sYTNScGIyNWxhVzV6TG1SbE1Tb3dLQVlKS29aSWh2Y05BUWtCRmh0egpkR1ZtWVc0dVpYTnpaWEpBYzJWcmRHbHZibVZwYm5NdVpHVXdnZ0VpTUEwR0NTcUdTSWIzRFFFQkFRVUFBNElCCkR3QXdnZ0VLQW9JQkFRRERBZjNobDdKWTBYY0ZuaXlFSnBTU0RxbjBPcUJyNlFQNjV1c0pQUnQvOFBhRG9xQnUKd0VZVC9OYSs2ZnNnUGpDMHVLOURaZ1dnMnRIV1dvYW5TYmxBTW96NVBINlorUzRTSFJaN2UyZERJalBqZGhqaAowbUxnMlVNTzV5cDBWNzk3R2dzOWxOdDZKUmZIODFNTjJvYlhXczROdHp0TE11RDZlZ3FwcjhkRGJyMzRhT3M4CnBrZHVpNVVhd1Raa3N5NXBMUEhxNWNNaEZHbTA2djY1Q0xvMFYyUGQ5K0tBb2tQclBjTjVLTEtlYno3bUxwazYKU01lRVhPS1A0aWRFcXh5UTdPN2ZCdUhNZWRzUWh1K3ByWTNzaTNCVXlLZlF0UDVDWm5YMmJwMHdLSHhYMTJEWAoxbmZGSXQ5RGJHdkhUY3lPdU4rblpMUEJtM3ZXeG50eUlJdlZBZ01CQUFHalFqQkFNQWtHQTFVZEV3UUNNQUF3CkVRWUpZSVpJQVliNFFnRUJCQVFEQWdlQU1Bc0dBMVVkRHdRRUF3SUZvREFUQmdOVkhTVUVEREFLQmdnckJnRUYKQlFjREFqQU5CZ2txaGtpRzl3MEJBUVVGQUFPQ0FRRUFHMGZaWVlDVGJkajFYWWMrMVNub2FQUit2SThDOENhRAo4KzBVWWhkbnlVNGdnYTBCQWNEclk5ZTk0ZUVBdTZacXljRjZGakxxWFhkQWJvcHBXb2NyNlQ2R0QxeDMzQ2tsClZBcnpHL0t4UW9oR0QySmVxa2hJTWxEb214SE83a2EzOStPYThpMnZXTFZ5alU4QVp2V01BcnVIYTRFRU55RzcKbFcyQWFnYUZLRkNyOVRuWFRmcmR4R1ZFYnY3S1ZRNmJkaGc1cDVTanBXSDErTXEwM3VSM1pYUEJZZHlWODMxOQpvMGxWajFLRkkyRENML2xpV2lzSlJvb2YrMWNSMzVDdGQwd1lCY3BCNlRac2xNY09QbDc2ZHdLd0pnZUpvMlFnClpzZm1jMnZDMS9xT2xOdU5xLzBUenprVkd2OEVUVDNDZ2FVK1VYZTRYT1Z2a2NjZWJKbjJkZz09Ci0tLS0tRU5EIENFUlRJRklDQVRFLS0tLS0K';
        $script = <<<'EOT'

error_reporting(-1);
$info = openssl_x509_parse(base64_decode('%s'));
var_dump(PHP_VERSION, $info['issuer']['emailAddress'], $info['validFrom_time_t']);

EOT;
        $script = '<'."?php\n".sprintf($script, $cert);

        try {
            $process = new PhpProcess($script);
            $process->mustRun();
        } catch (\Exception $e) {
            // In the case of any exceptions just accept it is not possible to
            // determine the safety of openssl_x509_parse and bail out.
            return self::$useOpensslParse = false;
        }

        $output = preg_split('{\r?\n}', trim($process->getOutput()));
        $errorOutput = trim($process->getErrorOutput());

        if (
            is_array($output)
            && count($output) === 3
            && $output[0] === sprintf('string(%d) "%s"', strlen(PHP_VERSION), PHP_VERSION)
            && $output[1] === 'string(27) "stefan.esser@sektioneins.de"'
            && $output[2] === 'int(-1)'
            && preg_match('{openssl_x509_parse\(\): illegal (?:ASN1 data type for|length in) timestamp in - on line \d+}', $errorOutput)
        ) {
            // This PHP has the fix backported probably by a distro security team.
            return self::$useOpensslParse = true;
        }

        return self::$useOpensslParse = false;
    }

    /**
     * Resets the static caches
     * @return void
     */
    public static function reset()
    {
        self::$caFileValidity = array();
        self::$caPath = null;
        self::$useOpensslParse = null;
    }

    /**
     * @param  string $name
     * @return string|false
     */
    private static function getEnvVariable($name)
    {
        if (isset($_SERVER[$name])) {
            return (string) $_SERVER[$name];
        }

        if (PHP_SAPI === 'cli' && ($value = getenv($name)) !== false && $value !== null) {
            return (string) $value;
        }

        return false;
    }

    /**
     * @param  string|false $certFile
     * @return bool
     */
    private static function caFileUsable($certFile, LoggerInterface $logger = null)
    {
        return $certFile && @is_file($certFile) && @is_readable($certFile) && static::validateCaFile($certFile, $logger);
    }

    /**
     * @param  string|false $certDir
     * @return bool
     */
    private static function caDirUsable($certDir)
    {
        return $certDir && @is_dir($certDir) && @is_readable($certDir) && glob($certDir . '/*');
    }
}
