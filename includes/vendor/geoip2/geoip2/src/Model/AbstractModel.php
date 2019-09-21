<?php

namespace GeoIp2\Model;

/**
 * @ignore
 */
abstract class AbstractModel implements \JsonSerializable
{
    protected $raw;

    /**
     * @ignore
     *
     * @param mixed $raw
     */
    public function __construct($raw)
    {
        $this->raw = $raw;
    }

    /**
     * @ignore
     *
     * @param mixed $field
     */
    protected function get($field)
    {
        if (isset($this->raw[$field])) {
            return $this->raw[$field];
        }
        if (preg_match('/^is_/', $field)) {
            return false;
        }

        return null;
    }

    /**
     * @ignore
     *
     * @param mixed $attr
     */
    public function __get($attr)
    {
        if ($attr !== 'instance' && property_exists($this, $attr)) {
            return $this->$attr;
        }

        throw new \RuntimeException("Unknown attribute: $attr");
    }

    /**
     * @ignore
     *
     * @param mixed $attr
     */
    public function __isset($attr)
    {
        return $attr !== 'instance' && isset($this->$attr);
    }

    public function jsonSerialize()
    {
        return $this->raw;
    }
}
