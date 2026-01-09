<?php

namespace Spatie\ArrayToXml;

use Closure;
use DOMDocument;
use DOMElement;
use DOMException;
use Exception;

class ArrayToXml
{
    protected DOMDocument $document;
    protected DOMElement $rootNode;

    protected bool $replaceSpacesByUnderScoresInKeyNames = true;

    protected bool $addXmlDeclaration = true;

    protected string $numericTagNamePrefix = 'numeric_';

    protected array $options = ['convertNullToXsiNil' => false, 'convertBoolToString' => false];

    public function __construct(
        array $array,
        string | array $rootElement = '',
        bool $replaceSpacesByUnderScoresInKeyNames = true,
        string | null $xmlEncoding = null,
        string $xmlVersion = '1.0',
        array $domProperties = [],
        bool | null $xmlStandalone = null,
        bool $addXmlDeclaration = true,
        array | null $options = ['convertNullToXsiNil' => false, 'convertBoolToString' => false]
    ) {
        $this->document = new DOMDocument($xmlVersion, $xmlEncoding ?? '');

        if (! is_null($xmlStandalone)) {
            $this->document->xmlStandalone = $xmlStandalone;
        }

        if (! empty($domProperties)) {
            $this->setDomProperties($domProperties);
        }

        $this->addXmlDeclaration = $addXmlDeclaration;

        $this->options = array_merge($this->options, $options);

        $this->replaceSpacesByUnderScoresInKeyNames = $replaceSpacesByUnderScoresInKeyNames;

        if (! empty($array) && $this->isArrayAllKeySequential($array)) {
            throw new DOMException('Invalid Character Error');
        }

        $this->rootNode = $this->createRootElement($rootElement);

        $this->document->appendChild($this->rootNode);

        $this->convertElement($this->rootNode, $array);
    }

    public function setNumericTagNamePrefix(string $prefix): void
    {
        $this->numericTagNamePrefix = $prefix;
    }

    public static function convert(
        array $array,
        $rootElement = '',
        bool $replaceSpacesByUnderScoresInKeyNames = true,
        ?string $xmlEncoding = null,
        string $xmlVersion = '1.0',
        array $domProperties = [],
        ?bool $xmlStandalone = null,
        bool $addXmlDeclaration = true,
        array $options = ['convertNullToXsiNil' => false]
    ): string {
        $converter = new static(
            $array,
            $rootElement,
            $replaceSpacesByUnderScoresInKeyNames,
            $xmlEncoding,
            $xmlVersion,
            $domProperties,
            $xmlStandalone,
            $addXmlDeclaration,
            $options
        );

        return $converter->toXml();
    }

    public function toXml($options = 0): string
    {
        return $this->addXmlDeclaration
            ? $this->document->saveXML(options: $options)
            : $this->document->saveXML($this->document->documentElement, $options);
    }

    public function toDom(): DOMDocument
    {
        return $this->document;
    }

    protected function ensureValidDomProperties(array $domProperties): void
    {
        foreach ($domProperties as $key => $value) {
            if (! property_exists($this->document, $key)) {
                throw new Exception("{$key} is not a valid property of DOMDocument");
            }
        }
    }

    public function setDomProperties(array $domProperties): self
    {
        $this->ensureValidDomProperties($domProperties);

        foreach ($domProperties as $key => $value) {
            $this->document->{$key} = $value;
        }

        return $this;
    }

    public function prettify(): self
    {
        $this->document->preserveWhiteSpace = false;
        $this->document->formatOutput = true;

        return $this;
    }

    public function dropXmlDeclaration(): self
    {
        $this->addXmlDeclaration = false;

        return $this;
    }

    public function addProcessingInstruction(string $target, string $data): self
    {
        $elements = $this->document->getElementsByTagName('*');

        $rootElement = $elements->count() > 0 ? $elements->item(0) : null;

        $processingInstruction = $this->document->createProcessingInstruction($target, $data);

        $this->document->insertBefore($processingInstruction, $rootElement);

        return $this;
    }

    protected function convertElement(DOMElement $element, mixed $value): void
    {
        if ($value instanceof Closure) {
            $value = $value();
        }

        $sequential = $this->isArrayAllKeySequential($value);

        if (! is_array($value)) {
            $value = htmlspecialchars($value ?? '');

            $value = $this->removeControlCharacters($value);

            $element->nodeValue = $value;

            return;
        }

        foreach ($value as $key => $data) {
            if (! $sequential) {
                if (($key === '_attributes') || ($key === '@attributes')) {
                    $this->addAttributes($element, $data);
                } elseif ((($key === '_value') || ($key === '@value')) && is_scalar($data)) {
                    $element->nodeValue = htmlspecialchars($data);
                } elseif ((($key === '_cdata') || ($key === '@cdata')) && is_scalar($data)) {
                    $element->appendChild($this->document->createCDATASection($data));
                } elseif ((($key === '_mixed') || ($key === '@mixed')) && is_scalar($data)) {
                    $fragment = $this->document->createDocumentFragment();
                    $fragment->appendXML($data);
                    $element->appendChild($fragment);
                } elseif ($key === '__numeric') {
                    $this->addNumericNode($element, $data);
                } elseif (str_starts_with($key, '__custom:')) {
                    $this->addNode($element, str_replace('\:', ':', preg_split('/(?<!\\\):/', $key)[1]), $data);
                } elseif (str_starts_with($key, '_comment') || str_starts_with($key, '@comment')) {
                    if ($data !== null && $data !== '') {
                        $element->appendChild(new \DOMComment($data));
                    }
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

    protected function addNumericNode(DOMElement $element, mixed $value): void
    {
        foreach ($value as $key => $item) {
            $this->convertElement($element, [$this->numericTagNamePrefix.$key => $item]);
        }
    }

    protected function addNode(DOMElement $element, string $key, mixed $value): void
    {
        if ($this->replaceSpacesByUnderScoresInKeyNames) {
            $key = str_replace(' ', '_', $key);
        }

        $child = $this->document->createElement($key);

        $this->addNodeTypeAttribute($child, $value);

        $element->appendChild($child);

        $value = $this->convertNodeValue($child, $value);

        $this->convertElement($child, $value);
    }

    protected function convertNodeValue(DOMElement $element, mixed $value): mixed
    {
        if ($this->options['convertBoolToString'] && is_bool($value)) {
            $value = $value ? 'true' : 'false';
        }

        return $value;
    }

    protected function addNodeTypeAttribute(DOMElement $element, mixed $value): void
    {
        if ($this->options['convertNullToXsiNil'] && is_null($value)) {
            if (! $this->rootNode->hasAttribute('xmlns:xsi')) {
                $this->rootNode->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
            }

            $element->setAttribute('xsi:nil', 'true');
        }
    }

    protected function addCollectionNode(DOMElement $element, mixed $value): void
    {
        if ($element->childNodes->length === 0 && $element->attributes->length === 0) {
            $this->convertElement($element, $value);

            return;
        }

        $child = $this->document->createElement($element->tagName);
        $element->parentNode->appendChild($child);
        $this->convertElement($child, $value);
    }

    protected function addSequentialNode(DOMElement $element, mixed $value): void
    {
        if (empty($element->nodeValue) && ! is_numeric($element->nodeValue)) {
            $element->nodeValue = htmlspecialchars($value);

            return;
        }

        $child = $this->document->createElement($element->tagName);
        $child->nodeValue = htmlspecialchars($value);
        $element->parentNode->appendChild($child);
    }

    protected function isArrayAllKeySequential(array | string | null $value): bool
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

    protected function addAttributes(DOMElement $element, array $data): void
    {
        foreach ($data as $attrKey => $attrVal) {
            $element->setAttribute($attrKey, $attrVal ?? '');
        }
    }

    protected function createRootElement(string|array $rootElement): DOMElement
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

            $this->addAttributes($element, $value);
        }

        return $element;
    }

    protected function removeControlCharacters(string $value): string
    {
        return preg_replace('/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F]/', '', $value);
    }
}
