<?php

declare(strict_types=1);

namespace Vaioni\OpenApiXmlSerializer;

use DOMDocument;
use DOMElement;

class XmlSerializer
{
    private DOMDocument $_document;

    /**
     * Default DAO for serialized objects.
     */
    public string $dao = 'stdClass';

    public function __construct()
    {
        $this->_document               = new DOMDocument('1.0', 'UTF-8');
        $this->_document->formatOutput = true;
        $this->_document->preserveWhiteSpace = false;
    }

    private function _serializeObject(object $var, DOMElement &$node): DOMElement
    {
        $getters = $var::getters();

        foreach ($var::attributeMap() as $property => $name) {
            $getter = $getters[$property];

            $value = $var->$getter();

            if ($value === null) continue;

            $element = $this->_document->createElement($name);

            $node->appendChild(
                $this->serializeElement(
                    $value,
                    $element
                )
            );
        }

        return $node;
    }

    public function serializeElement(mixed $var, DOMElement &$node): DOMElement
    {
        return match (gettype($var)) {
            'object' => $this->_serializeObject($var, $node),
            'array' => $this->_serializeArray($var, $node),
            default => $this->_serializeVar($var, $node),
        };
    }

    public function serialize(mixed $var, string $tag = null): string
    {
        // SOAP ENVELOPE ELEMENT AND ATTRIBUTES
        $soap = $this->_document->createElementNS('http://schemas.xmlsoap.org/soap/envelope/', 'soap:Envelope');
        $this->_document->appendChild($soap);

        $soap->setAttributeNS('http://www.w3.org/2000/xmlns/', 'xmlns:soap', 'http://schemas.xmlsoap.org/soap/envelope/');

        // SOAP BODY
        $body = $this->_document->createElementNS('http://schemas.xmlsoap.org/soap/envelope/', 'soap:Body');
        $soap->appendChild($body);

        // XML
        $element = $this->_document->createElement(empty($tag) ? $this->_getTag($var) : $tag);

        $body->appendChild(
            $this->serializeElement(
                $var,
                $element
            )
        );

        return $this->_document->saveXML();
    }

    private function _getTag(mixed $var): string
    {
        return is_object($var)
        ? (new $var)->getModelName()
        : gettype($var);
    }

    private function _serializeArray(array $array, DOMElement &$node): DOMElement
    {
        foreach ($array as $key => $value) {
            $element = $node->ownerDocument->createElement('element');
            $element->setAttribute('s:key', $key);
            $node->appendChild($this->serializeElement($value, $element));
        }

        return $node;
    }

    private function _serializeVar(mixed $var, DOMElement &$element): DOMElement
    {
        if (is_bool($var))
            $element->nodeValue = $var ? 'true' : 'false';
        else
            $element->nodeValue = (string)$var;

        return $element;
    }
}
