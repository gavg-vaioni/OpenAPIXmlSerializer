<?php

declare(strict_types=1);

namespace Vaioni\OpenApiXmlSerializer;

use DOMDocument;
use DOMElement;
use DOMNode;
use DOMText;

class XmlDeserializer
{
    private DOMDocument $_document;

    /**
     * Default DAO
     */
    public static string $dao = 'stdClass';

    protected string $targetNamespace;

    public function __construct(string $targetNamespace)
    {
        $this->_document                     = new DOMDocument();
        $this->_document->formatOutput       = true;
        $this->_document->encoding           = 'utf-8';
        $this->_document->preserveWhiteSpace = false;
        $this->targetNamespace = $targetNamespace;
    }

    private function _deserializeObject(DOMElement $node, string|null $class = null): object
    {
        if (!class_exists($class) && $class !== static::$dao) {
            $class = $this->targetNamespace . '\\' . $node->nodeName;
            if (empty($class)) $class = static::$dao;
        }

        $object = new $class;

        if (method_exists($object, 'setters')) {
            $setters = $class::setters();
            $attributeMap = array_flip($class::attributeMap());

            foreach ($node->childNodes as $child) {
                $attribute = $attributeMap[$child->nodeName];
                $setter = $setters[$attribute] ?? reset($setters);
                $object->$setter($this->deserializeElement($child));
            }

            return $object;
        }

        foreach ($node->childNodes as $child) {
            $object->{$child->nodeName} = $this->deserializeElement($child);
        }

        return $object;
    }

    public function deserializeElement(
        DOMNode $node, string|null $class = null
    ): array|bool|float|int|object|string
    {
        if ($node instanceof DOMText || $node->childElementCount === 0) {
            return $node->nodeValue;
        }

        if ($class !== null) {
            // If a class is given, assume we need to deserialize an object
            return $this->_deserializeObject(
                $node,
                class_exists($class)
                ? $class
                : static::$dao
            );
        }

        // Guess the class name if none is given
        $class = $this->targetNamespace . '\\' . ucfirst($node->nodeName);

        if (class_exists($class)) {
            return $this->_deserializeObject($node, $class);
        }

        return $this->_deserializeArray($node);
    }

    public function deserializeString(string $xml, string|null $class = null): array|bool|float|int|object|null|string
    {
        $this->_document->loadXML($xml);

        return $this->_deserialize($class);
    }

    private function _deserializeArray(DOMElement $node): array
    {
        return array_map(
            $this->deserializeElement(...),
            iterator_to_array($node->childNodes)
        );
    }

    private function _deserialize(string|null $class = null): array|bool|float|int|object|null|string
    {
        $node = ($this->_document->documentElement->nodeName == 'soap:Envelope')
        ? $this->_document->documentElement->firstChild->firstChild
        : $this->_document->documentElement;

        return $this->deserializeElement($node, $class);
    }
}