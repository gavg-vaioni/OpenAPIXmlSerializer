<?php

declare(strict_types=1);

namespace Vaioni\OpenApiXmlSerializer;

require_once 'functions.php';

class XmlDeserializer
{
    /**
     * @var \DOMDocument
     */
    private $_document;

    /**
     * Default DAO
     * @var string
     */
    public static $dao = 'stdClass';

    protected string $targetNamespace;

    public function __construct(string $targetNamespace)
    {
        $this->_document                     = new \DOMDocument();
        $this->_document->formatOutput       = true;
        $this->_document->encoding           = 'utf-8';
        $this->_document->preserveWhiteSpace = false;
        $this->targetNamespace = $targetNamespace;
    }

    /**
     * Deserializes XML node to object.
     *
     * @param \DOMElement $node  XML element to be deserialized.
     * @param null|string $class Forced DAO class for object.
     *
     * @internal param null|object|string $object Forced object or class.
     *
     * @return object
     */
    private function _deserializeObject(\DOMElement $node, $class = null)
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

    /**
     * Deserializes XML node.
     *
     * @param \DOMElement $node  Node to deserialize.
     * @param null|string $class Forced DAO class for object.
     *
     * @return array|bool|float|int|object|string
     */
    public function deserializeElement(\DOMNode $node, $class = null)
    {
        if ($node instanceof \DOMText || $node->childElementCount === 0) {
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

    /**
     * Deserializes XML string.
     *
     * @param string      $xml String that contains xml to deserialize.
     * @param null|string $class Forced DAO class for object.
     *
     * @return array|bool|float|int|object|null|string
     */
    public function deserializeString($xml, $class = null)
    {
        $this->_document->loadXML($xml);

        return $this->_deserialize($class);
    }

    /**
     * Deserializes array from XML node.
     *
     * @param \DOMElement $node Node to be deserialized.
     *
     * @return array Deserialized array.
     */
    private function _deserializeArray(\DOMElement $node)
    {
        $array = array();
        foreach ($node->childNodes as $element)
            if($element instanceof \DOMElement)
                $array[] = $this->deserializeElement($element);

        return $array;
    }

    /**
     * Deserialization helper.
     *
     * @param null|string $class Forced DAO class for object.
     * @return array|bool|float|int|object|null|string
     */
    private function _deserialize($class = null)
    {
        $node = ($this->_document->documentElement->nodeName == 'soap:Envelope')
        ? $this->_document->documentElement->firstChild->firstChild
        : $this->_document->documentElement;

        return $this->deserializeElement($node, $class);
    }
}