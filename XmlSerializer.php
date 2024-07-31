<?php

namespace Vaioni\OpenApiXmlSerializer;

require_once 'functions.php';

class XmlSerializer
{
    /**
     * @var \DOMDocument
     */
    private $_document;

    /**
     * Default DAO for serialized objects.
     *
     * @var string
     */
    public $dao = 'stdClass';

    public function __construct()
    {
        $this->_document               = new \DOMDocument('1.0', 'UTF-8');
        $this->_document->formatOutput = true;
        $this->_document->preserveWhiteSpace = false;
    }

    /**
     * Serializes object.
     *
     * @param object      $var
     * @param \DOMElement $node
     *
     * @return \DOMElement
     */
    private function _serializeObject($var, \DOMElement &$node)
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

    /**
     * Serializes object to specified element.
     *
     * @param mixed       $var
     * @param \DOMElement $node
     *
     * @return \DOMElement
     */
    public function serializeElement($var, \DOMElement &$node)
    {
        switch (gettype($var)) {
            case 'object':
                $node = $this->_serializeObject($var, $node);
                break;
            case 'array':
                $node = $this->_serializeArray($var, $node);
                break;
            default:
                $node = $this->_serializeVar($var, $node);
                break;
        }

        return $node;
    }

    /**
     * Serializes object.
     *
     * @param mixed  $var Object to serialize.
     * @param string $tag XML Tag for root.
     *
     * @return string XML string with serialized object.
     */
    public function serialize($var, $tag = null)
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

    /**
     * Gets tag for variable.
     *
     * @param mixed $var Variable to determine tag.
     *
     * @return string Xml Tag.
     */
    private function _getTag($var)
    {
        if (!is_object($var)) return gettype($var);
        return (new $var)->getModelName();
    }

    /**
     * Serializes array to xml element.
     *
     * @param array       $array Array to serialize.
     * @param \DOMElement $node  Xml node.
     *
     * @return \DOMElement
     */
    private function _serializeArray(array $array, \DOMElement &$node)
    {
        foreach ($array as $key => $value) {
            $element = $node->ownerDocument->createElement('element');
            $element->setAttribute('s:key', $key);
            $node->appendChild($this->serializeElement($value, $element));
        }

        return $node;
    }

    /**
     * Serializes scalar to xml node.
     *
     * @param mixed       $var     Scalar to serialize.
     * @param \DOMElement $element Xml node.
     *
     * @return \DOMElement
     */
    private function _serializeVar($var, \DOMElement &$element)
    {
        if (is_bool($var))
            $element->nodeValue = $var ? 'true' : 'false';
        else
            $element->nodeValue = (string)$var;

        return $element;
    }
}
