<?php

namespace GeoIp2\Record;

abstract class AbstractPlaceRecord extends AbstractRecord
{
    private $locales;

    /**
     * @ignore
     */
    public function __construct($record, $locales = array('en'))
    {
        $this->locales = $locales;
        parent::__construct($record);
    }

    /**
     * @ignore
     */
    public function __get($attr)
    {
        if ($attr == 'name') {
            return $this->name();
        } else {
            return parent::__get($attr);
        }
    }

    /**
     * @ignore
     */
    public function __isset($attr)
    {
        if ($attr == 'name') {
            return $this->firstSetNameLocale() == null ? false : true;
        } else {
            return parent::__isset($attr);
        }
    }

    private function name()
    {
        $locale = $this->firstSetNameLocale();
        return $locale === null ? null : $this->names[$locale];
    }

    private function firstSetNameLocale()
    {
        foreach ($this->locales as $locale) {
            if (isset($this->names[$locale])) {
                return $locale;
            }
        }
        return null;
    }
}
