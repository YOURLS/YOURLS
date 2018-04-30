<?php

namespace GeoIp2\Compat;

// @codingStandardsIgnoreFile

/**
  * This interface exists to provide backwards compatibility with PHP 5.3
  *
  * This should _not_ be used by any third-party code.
  *
  * @ignore
  */
if (interface_exists('JsonSerializable')) {
    interface JsonSerializable extends \JsonSerializable
    {
    }
} else {
    interface JsonSerializable
    {
        /**
         * Returns data that can be serialized by json_encode
         * @ignore
         */
        public function jsonSerialize();
    }
}
