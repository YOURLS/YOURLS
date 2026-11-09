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
    /**
     * SHA-256 of the DER encoded SubjectPublicKeyInfo of distrusted (e.g. compromised) intermediates
     *
     * Matching on the key also catches cross-signed copies of the same intermediate.
     *
     * @var array<string, string>
     */
    private static $distrustedSpkiSha256 = array(
        // eMudhra intermediates with compromised keys, revoked 2026-10-18 (cross-signed by Sectigo's AAA Certificate Services)
        'e0254c7fcdc265e2f0f8a428dabb75ab4ae039b4872d62f5ee57f0877d5a8a41' => 'EM EV TLS CA - G3B',
        '43bffa19d6ef651451f6841e019931e96f6f2eaeff28ab4b6f1ce4576de2717b' => 'EM OV TLS CA - G3B',
        'ebed6475c2c2d80fcb199f3fe8dd6e6b3ce60b77eb15d4e42c3dec0c6f5b5105' => 'EM DV TLS CA - G3B',
        '5c0660a2b164910d8ff589c18e14552e9e0ec237dcefe2cb736d41a4811f81a0' => 'EM EV TLS CA - G3C',
        '63ecefee431d49523bc1136c4e72d0206a477086caf606cd5cf025686c109cf8' => 'EM OV TLS CA - G3C',
        '49dd353dc2b919a3770645117d0e60c16115e7d1bc259eefe734b00ea434fe5f' => 'EM DV TLS CA - G3C',
        'ec4ffa1ad0ac88081314b7aaffef6a91f97cd57291bb5ba686c5415f5eb4f6b6' => 'EM OV CS CA - G3B',
        '92c063d67e8f14db71d288e11266ffdaf69cbf115f7bab14f3bc2f68d25e0e30' => 'EM OV CS CA - G3C',
    );

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
    public static function getSystemCaRootBundlePath(?LoggerInterface $logger = null)
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
            '/etc/pki/ca-trust/extracted/pem/tls-ca-bundle.pem', // Fedora, RHEL, CentOS (ca-certificates package) - NEW
            '/etc/pki/tls/certs/ca-bundle.crt', // Fedora, RHEL, CentOS (ca-certificates package) - Deprecated
            '/etc/ssl/certs/ca-certificates.crt', // Debian, Ubuntu, Gentoo, Arch Linux (ca-certificates package)
            '/etc/ssl/ca-bundle.pem', // SUSE, openSUSE (ca-certificates package)
            '/usr/ssl/certs/ca-bundle.crt', // Cygwin
            '/opt/local/share/curl/curl-ca-bundle.crt', // OS X macports, curl-ca-bundle package
            '/usr/local/share/curl/curl-ca-bundle.crt', // Default cURL CA bunde path (without --with-ca-bundle option)
            '/usr/share/ssl/certs/ca-bundle.crt', // Really old RedHat?
            '/etc/ssl/cert.pem', // OpenBSD
            '/usr/local/etc/openssl/cert.pem', // OS X homebrew, openssl package
            '/usr/local/etc/openssl@1.1/cert.pem', // OS X homebrew, openssl@1.1 package
            '/opt/homebrew/etc/openssl@3/cert.pem', // macOS silicon homebrew, openssl@3 package
            '/opt/homebrew/etc/openssl@1.1/cert.pem', // macOS silicon homebrew, openssl@1.1 package
            '/etc/pki/tls/certs',
            '/etc/ssl/certs', // FreeBSD
        );

        $caBundlePaths = array_merge($caBundlePaths, $otherLocations);

        foreach ($caBundlePaths as $caBundle) {
            if ($caBundle && self::caFileUsable($caBundle, $logger)) {
                return self::$caPath = $caBundle;
            }

            if ($caBundle && self::caDirUsable($caBundle, $logger)) {
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
    public static function validateCaFile($filename, ?LoggerInterface $logger = null)
    {
        static $warned = false;

        if (isset(self::$caFileValidity[$filename])) {
            return self::$caFileValidity[$filename];
        }

        $contents = file_get_contents($filename);

        if (is_string($contents) && strlen($contents) > 0) {
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
        return true;
    }

    /**
     * Looks for distrusted intermediates in a certificate chain presented by a server
     *
     * The system CA store may still trust the roots above them, so they need to be rejected by the client.
     *
     * @param  array<mixed> $chain PEM strings, or X.509 certificates as captured by the peer_certificate_chain stream context option
     * @return string|null  name of the first distrusted certificate found in the chain
     */
    public static function findDistrustedCertificate(array $chain)
    {
        foreach ($chain as $cert) {
            if (self::isX509Certificate($cert)) {
                if (!function_exists('openssl_x509_export') || !openssl_x509_export($cert, $pem)) {
                    continue;
                }
                $cert = $pem;
            } elseif (!is_string($cert)) {
                continue;
            }

            foreach (self::pemToDer($cert) as $der) {
                $spki = self::extractSpki($der);
                if (null !== $spki && isset(self::$distrustedSpkiSha256[$hash = hash('sha256', $spki)])) {
                    return self::$distrustedSpkiSha256[$hash];
                }
            }
        }

        return null;
    }

    /**
     * Checks for an OpenSSLCertificate (PHP 8+) or OpenSSL X.509 resource (PHP < 8)
     *
     * @param  mixed $cert
     * @return bool
     */
    private static function isX509Certificate($cert)
    {
        return $cert instanceof \OpenSSLCertificate || (is_resource($cert) && get_resource_type($cert) === 'OpenSSL X.509');
    }

    /**
     * @param  string       $pem one or more PEM encoded certificates
     * @return list<string>
     */
    private static function pemToDer($pem)
    {
        $ders = array();
        $offset = 0;
        while (false !== ($start = strpos($pem, '-----BEGIN CERTIFICATE-----', $offset))) {
            $start += strlen('-----BEGIN CERTIFICATE-----');
            $end = strpos($pem, '-----END CERTIFICATE-----', $start);
            if (false === $end) {
                break;
            }
            $offset = $end + strlen('-----END CERTIFICATE-----');

            $der = base64_decode(substr($pem, $start, $end - $start), true);
            if (false !== $der) {
                $ders[] = $der;
            }
        }

        return $ders;
    }

    /**
     * Walks the DER structure by hand as parsing the key with ext-openssl costs ~0.3ms per certificate
     *
     * Certificate ::= SEQUENCE { tbsCertificate SEQUENCE { [0] version OPTIONAL, serialNumber, signature, issuer, validity, subject, subjectPublicKeyInfo, ... }, ... }
     *
     * @param  string $der
     * @return string|null
     */
    private static function extractSpki($der)
    {
        $offset = 0;
        // enter Certificate and tbsCertificate
        for ($i = 0; $i < 2; $i++) {
            if (!self::isSequenceAt($der, $offset) || null === self::readDerHeader($der, $offset)) {
                return null;
            }
        }

        $fieldsToSkip = isset($der[$offset]) && ord($der[$offset]) === 0xA0 ? 6 : 5;
        for ($i = 0; $i < $fieldsToSkip; $i++) {
            $length = self::readDerHeader($der, $offset);
            if (null === $length) {
                return null;
            }
            $offset += $length;
        }

        $start = $offset;
        if (!self::isSequenceAt($der, $offset)) {
            return null;
        }
        $length = self::readDerHeader($der, $offset);
        if (null === $length) {
            return null;
        }

        return substr($der, $start, $offset - $start + $length);
    }

    /**
     * @param  string $der
     * @param  int    $offset
     * @return bool
     */
    private static function isSequenceAt($der, $offset)
    {
        return isset($der[$offset]) && ord($der[$offset]) === 0x30;
    }

    /**
     * Reads the tag and length at $offset, moving $offset to the start of the contents
     *
     * @param  string   $der
     * @param  int      $offset
     * @return int|null length of the contents
     * @phpstan-impure
     */
    private static function readDerHeader($der, &$offset)
    {
        // high tag numbers (multi-byte tags) do not occur in the fields we walk
        if (!isset($der[$offset + 1]) || (ord($der[$offset]) & 0x1F) === 0x1F) {
            return null;
        }

        $length = ord($der[$offset + 1]);
        $offset += 2;
        if (($length & 0x80) !== 0) {
            // max 3 length bytes (16MB) so the length cannot overflow on 32-bit PHP
            $bytes = $length & 0x7F;
            if ($bytes === 0 || $bytes > 3 || !isset($der[$offset + $bytes - 1])) {
                return null;
            }
            $length = 0;
            for ($i = 0; $i < $bytes; $i++) {
                $length = ($length << 8) | ord($der[$offset++]);
            }
        }

        return $offset + $length <= strlen($der) ? $length : null;
    }

    /**
     * Resets the static caches
     * @return void
     */
    public static function reset()
    {
        self::$caFileValidity = array();
        self::$caPath = null;
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
     * @param  LoggerInterface|null $logger
     * @return bool
     */
    private static function caFileUsable($certFile, ?LoggerInterface $logger = null)
    {
        return $certFile
            && self::isFile($certFile, $logger)
            && self::isReadable($certFile, $logger)
            && self::validateCaFile($certFile, $logger);
    }

    /**
     * @param  string|false $certDir
     * @param  LoggerInterface|null $logger
     * @return bool
     */
    private static function caDirUsable($certDir, ?LoggerInterface $logger = null)
    {
        return $certDir
            && self::isDir($certDir, $logger)
            && self::isReadable($certDir, $logger)
            && self::glob($certDir . '/*', $logger);
    }

    /**
     * @param  string $certFile
     * @param  LoggerInterface|null $logger
     * @return bool
     */
    private static function isFile($certFile, ?LoggerInterface $logger = null)
    {
        $isFile = @is_file($certFile);
        if (!$isFile && $logger) {
            $logger->debug(sprintf('Checked CA file %s does not exist or it is not a file.', $certFile));
        }

        return $isFile;
    }

    /**
     * @param  string $certDir
     * @param  LoggerInterface|null $logger
     * @return bool
     */
    private static function isDir($certDir, ?LoggerInterface $logger = null)
    {
        $isDir = @is_dir($certDir);
        if (!$isDir && $logger) {
            $logger->debug(sprintf('Checked directory %s does not exist or it is not a directory.', $certDir));
        }

        return $isDir;
    }

    /**
     * @param  string $certFileOrDir
     * @param  LoggerInterface|null $logger
     * @return bool
     */
    private static function isReadable($certFileOrDir, ?LoggerInterface $logger = null)
    {
        $isReadable = @is_readable($certFileOrDir);
        if (!$isReadable && $logger) {
            $logger->debug(sprintf('Checked file or directory %s is not readable.', $certFileOrDir));
        }

        return $isReadable;
    }

    /**
     * @param  string $pattern
     * @param  LoggerInterface|null $logger
     * @return bool
     */
    private static function glob($pattern, ?LoggerInterface $logger = null)
    {
        $certs = glob($pattern);
        if ($certs === false) {
            if ($logger) {
                $logger->debug(sprintf("An error occurred while trying to find certificates for pattern: %s", $pattern));
            }
            return false;
        }

        if (count($certs) === 0) {
            if ($logger) {
                $logger->debug(sprintf("No CA files found for pattern: %s", $pattern));
            }
            return false;
        }

        return true;
    }
}
