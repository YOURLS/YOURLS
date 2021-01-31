<?php

namespace Spatie\ArrayToXml;

use DOMDocument;
use DOMElement;
use DOMException;
use Exception;

class ArrayToXml
{
    protected $document;

    protected $replaceSpacesByUnderScoresInKeyNames = true;

    protected $addXmlDeclaration = true;

    protected $numericTagNamePrefix = 'numeric_';

    public function __construct(
        array $array,
        $rootElement = '',
        $replaceSpacesByUnderScoresInKeyNames = true,
        $xmlEncoding = null,
        $xmlVersion = '1.0',
        $domProperties = [],
        $xmlStandalone = null
    ) {
        $this->document = new DOMDocument($xmlVersion, $xmlEncoding);

        if (! is_null($xmlStandalone)) {
            $this->document->xmlStandalone = $xmlStandalone;
        }

        if (! empty($domProperties)) {
            $this->setDomProperties($domProperties);
        }

        $this->replaceSpacesByUnderScoresInKeyNames = $replaceSpacesByUnderScoresInKeyNames;

        if ($this->isArrayAllKeySequential($array) && ! empty($array)) {
            throw new DOMException('Invalid Character Error');
        }

        $root = $this->createRootElement($rootElement);

        $this->document->appendChild($root);

        $this->convertElement($root, $array);
    }

    public function setNumericTagNamePrefix(string $prefix)
    {
        $this->numericTagNamePrefix = $prefix;
    }

    public static function convert(
        array $array,
        $rootElement = '',
        bool $replaceSpacesByUnderScoresInKeyNames = true,
        string $xmlEncoding = null,
        string $xmlVersion = '1.0',
        array $domProperties = [],
        bool $xmlStandalone = null
    ) {
        $converter = new static(
            $array,
            $rootElement,
            $replaceSpacesByUnderScoresInKeyNames,
            $xmlEncoding,
            $xmlVersion,
            $domProperties,
            $xmlStandalone
        );

        return $converter->toXml();
    }

    public function toXml(): string
    {
        if ($this->addXmlDeclaration === false) {
            return $this->document->saveXml($this->document->documentElement);
        }

        return $this->document->saveXML();
    }

    public function toDom(): DOMDocument
    {
        return $this->document;
    }

    protected function ensureValidDomProperties(array $domProperties)
    {
        foreach ($domProperties as $key => $value) {
            if (! property_exists($this->document, $key)) {
                throw new Exception($key.' is not a valid property of DOMDocument');
            }
        }
    }

    public function setDomProperties(array $domProperties)
    {
        $this->ensureValidDomProperties($domProperties);

        foreach ($domProperties as $key => $value) {
            $this->document->{$key} = $value;
        }

        return $this;
    }

    public function prettify()
    {
        $this->document->preserveWhiteSpace = false;
        $this->document->formatOutput = true;

        return $this;
    }

    public function dropXmlDeclaration()
    {
        $this->addXmlDeclaration = false;

        return $this;
    }

    private function convertElement(DOMElement $element, $value)
    {
        $sequential = $this->isArrayAllKeySequential($value);

        if (! is_array($value)) {
            $value = htmlspecialchars($value);

            $value = $this->removeControlCharacters($value);

            $element->nodeValue = $value;

            return;
        }

        foreach ($value as $key => $data) {
            if (! $sequential) {
                if (($key === '_attributes') || ($key === '@attributes')) {
                    $this->addAttributes($element, $data);
                } elseif ((($key === '_value') || ($key === '@value')) && is_string($data)) {
                    $element->nodeValue = htmlspecialchars($data);
                } elseif ((($key === '_cdata') || ($key === '@cdata')) && is_string($data)) {
                    $element->appendChild($this->document->createCDATASection($data));
                } elseif ((($key === '_mixed') || ($key === '@mixed')) && is_string($data)) {
                    $fragment = $this->document->createDocumentFragment();
                    $fragment->appendXML($data);
                    $element->appendChild($fragment);
                } elseif ($key === '__numeric') {
                    $this->addNumericNode($element, $data);
                } elseif (substr($key, 0, 9) === '__custom:') {
                    $this->addNode($element, explode(':', $key)[1], $data);
                } else {
                    $this->addNode($element, $key, $data);
                }
            } elseif (is_array($data)) {
                $this->addCollectionNode($element, $data);
            } else {
                $this->addSequentialNode($element, $data);
            }
        }
    }

    protected function addNumericNode(DOMElement $element, $value)
    {
        foreach ($value as $key => $item) {
            $this->convertElement($element, [$this->numericTagNamePrefix.$key => $item]);
        }
    }

    protected function addNode(DOMElement $element, $key, $value)
    {
        if ($this->replaceSpacesByUnderScoresInKeyNames) {
            $key = str_replace(' ', '_', $key);
        }

        $child = $this->document->createElement($key);
        $element->appendChild($child);
        $this->convertElement($child, $value);
    }

    protected function addCollectionNode(DOMElement $element, $value)
    {
        if ($element->childNodes->length === 0 && $element->attributes->length === 0) {
            $this->convertElement($element, $value);

            return;
        }

        $child = $this->document->createElement($element->tagName);
        $element->parentNode->appendChild($child);
        $this->convertElement($child, $value);
    }

    protected function addSequentialNode(DOMElement $element, $value)
    {
        if (empty($element->nodeValue) && ! is_numeric($element->nodeValue)) {
            $element->nodeValue = htmlspecialchars($value);

            return;
        }

        $child = new DOMElement($element->tagName);
        $child->nodeValue = htmlspecialchars($value);
        $element->parentNode->appendChild($child);
    }

    protected function isArrayAllKeySequential($value)
    {
        if (! is_array($value)) {
            return false;
        }

        if (count($value) <= 0) {
            return true;
        }

        if (\key($value) === '__numeric') {
            return false;
        }

        return array_unique(array_map('is_int', array_keys($value))) === [true];
    }

    protected function addAttributes(DOMElement $element, array $data)
    {
        foreach ($data as $attrKey => $attrVal) {
            $element->setAttribute($attrKey, $attrVal);
        }
    }

    protected function createRootElement($rootElement): DOMElement
    {
        if (is_string($rootElement)) {
            $rootElementName = $rootElement ?: 'root';

            return $this->document->createElement($rootElementName);
        }

        $rootElementName = $rootElement['rootElementName'] ?? 'root';

        $element = $this->document->createElement($rootElementName);

        foreach ($rootElement as $key => $value) {
            if ($key !== '_attributes' && $key !== '@attributes') {
                continue;
            }

            $this->addAttributes($element, $rootElement[$key]);
        }

        return $element;
    }

    protected function removeControlCharacters(string $value): string
    {
        return preg_replace('/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F]/', '', $value);
    }
}
