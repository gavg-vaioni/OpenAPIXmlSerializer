<?php

declare(strict_types=1);

namespace Vaioni\OpenApiXmlSerializer;

use DOMDocument;
use DOMElement;

class XmlSerializer
{
    public function __construct(
        private DOMDocument $document = new DOMDocument('1.0', 'UTF-8'),
    ) {
    }

    public function __invoke(mixed $var, string|null $tag = null): string
    {
        // SOAP envelope element and attributes
        $soap = $this->document->createElementNS(
            'http://schemas.xmlsoap.org/soap/envelope/',
            'soap:Envelope',
        );
        $this->document->appendChild($soap);

        $soap->setAttributeNS(
            'http://www.w3.org/2000/xmlns/',
            'xmlns:soap',
            'http://schemas.xmlsoap.org/soap/envelope/',
        );

        // SOAP body
        $body = $this->document->createElementNS(
            'http://schemas.xmlsoap.org/soap/envelope/',
            'soap:Body',
        );
        $soap->appendChild($body);

        // XML
        $element = $this->document->createElement(empty($tag) ? $this->getTag($var) : $tag);

        $body->appendChild(
            $this->serializeElement(
                $var,
                $element,
            ),
        );

        return $this->document->saveXML();
    }

    private function serializeObject(object $var, DOMElement &$node): DOMElement
    {
        $getters = $var::getters();

        foreach ($var::attributeMap() as $property => $name) {
            $getter = $getters[$property];

            $value = $var->$getter();

            if ($value === null) {
                continue;
            }

            $element = $this->document->createElement($name);

            $node->appendChild(
                $this->serializeElement(
                    $value,
                    $element,
                ),
            );
        }

        return $node;
    }

    private function serializeElement(mixed $var, DOMElement &$node): DOMElement
    {
        return match (gettype($var)) {
            'object' => $this->serializeObject($var, $node),
            'array' => $this->serializeArray($var, $node),
            default => $this->serializeVar($var, $node),
        };
    }

    private function getTag(mixed $var): string
    {
        return is_object($var)
        ? (new $var())->getModelName()
        : gettype($var);
    }

    /** @param mixed[] $array */
    private function serializeArray(array $array, DOMElement &$node): DOMElement
    {
        foreach ($array as $key => $value) {
            $element = $node->ownerDocument->createElement('element');
            $element->setAttribute('s:key', $key);
            $node->appendChild($this->serializeElement($value, $element));
        }

        return $node;
    }

    private function serializeVar(mixed $var, DOMElement &$element): DOMElement
    {
        if (is_bool($var)) {
            $element->nodeValue = $var ? 'true' : 'false';
        } else {
            $element->nodeValue = (string) $var;
        }

        return $element;
    }
}
