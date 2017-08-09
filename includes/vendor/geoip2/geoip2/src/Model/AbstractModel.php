<?php

namespace GeoIp2\Model;

use GeoIp2\Compat\JsonSerializable;

/**
 * @ignore
 */
abstract class AbstractModel implements JsonSerializable
{
    protected $raw;

    /**
     * @ignore
     */
    public function __construct($raw)
    {
        $this->raw = $raw;
    }

    /**
     * @ignore
     */
    protected function get($field)
    {
        if (isset($this->raw[$field])) {
            return $this->raw[$field];
        } else {
            if (preg_match('/^is_/', $field)) {
                return false;
            } else {
                return null;
            }
        }
    }

    /**
     * @ignore
     */
    public function __get($attr)
    {
        if ($attr != "instance" && property_exists($this, $attr)) {
            return $this->$attr;
        }

        throw new \RuntimeException("Unknown attribute: $attr");
    }

    /**
     * @ignore
     */
    public function __isset($attr)
    {
        return $attr != "instance" && isset($this->$attr);
    }

    public function jsonSerialize()
    {
        return $this->raw;
    }
}
