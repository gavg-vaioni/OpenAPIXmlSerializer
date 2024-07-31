<?php

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
    public $dao = 'stdClass';

    public function __construct()
    {
        $this->_document                     = new \DOMDocument();
        $this->_document->formatOutput       = true;
        $this->_document->encoding           = 'utf-8';
        $this->_document->preserveWhiteSpace = false;
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
        if (!class_exists($class)) {
            $class = $node->getAttributeNS('urn:vaioni:serializer', 'type');
            if (empty($class)) $class = $this->dao;
        }

        if (is_subclass_of($class, 'Vaioni\\OpenApiXmlSerializer\\XmlSerializable'))
            return $class::fromXml($node, $this);

        $object = new $class;

        $reflection = new \ReflectionObject($object);
        $table      = array();

        foreach ($reflection->getProperties() as $property) {
            $property->setAccessible(true);
            $annotations = getAnnotations($property->getDocComment());

            if (isset($annotations['xml-skip'])) continue;
            if (isset($annotations['xml-attrib'])) {
                $name                   = !empty($annotations['xml-attrib']) ? $annotations['xml-attrib'] : $property->getName();
                $table['attrib'][$name] = $property;
            } else {
                $name                  = !empty($annotations['xml-tag']) ? $annotations['xml-tag'] : $property->getName();
                $table['child'][$name] = $property;
            }
        }

        foreach ($node->attributes as $attribute) {
            if (isset($table['attrib'][$attribute->nodeName])) {
                $table['attrib'][$attribute->nodeName]->setValue($object, $attribute->nodeValue);

                if (!$table['attrib'][$attribute->nodeName]->isPublic())
                    $table['attrib'][$attribute->nodeName]->setAccessible(false);
            }
        }

        foreach ($node->childNodes as $child) {
            if (isset($table['child'][$child->nodeName])) {
                $table['child'][$child->nodeName]->setValue($object, $this->deserializeElement($child));

                if (!$table['child'][$child->nodeName]->isPublic())
                    $table['child'][$child->nodeName]->setAccessible(false);
            } elseif ($child instanceof \DOMElement) {
                $object->{$child->nodeName} = $this->deserializeElement($child);
            }
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
    public function deserializeElement(\DOMElement $node, $class = null)
    {
        $type = $node->getAttributeNS('urn:vaioni:serializer', 'type');

        $hasAttributes = false;
        foreach($node->attributes as $attribute)
            if(strpos($attribute->nodeName, ':') === false)
                $hasAttributes = true;

        if ($type == 'array')
            return $this->_deserializeArray($node);
        elseif (class_exists($type) || $node->firstChild instanceof \DOMElement || $hasAttributes)
            return $this->_deserializeObject($node, $class);
        else
            return $this->_deserializeVar($node);
    }

    /**
     * Deserializes XML string.
     *
     * @param string      $xml String that contains xml to deserialize.
     * @param null|string $class Forced DAO class for object.
     *
     * @return array|bool|float|int|null|string
     */
    public function deserializeString($xml, $class = null)
    {
        $this->_document->loadXML($xml);

        return $this->_deserialize($class);
    }

    /**
     * Deserializes XML file.
     *
     * @param string      $file Path to file.
     * @param null|string $class Forced DAO class for object.
     *
     * @return array|bool|float|int|null|string
     */
    public function deserializeFile($file, $class = null)
    {
        $this->_document->load($file);

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
                $array[$element->getAttributeNS('urn:vaioni:serializer', 'key')] = $this->deserializeElement($element);

        return $array;
    }

    /**
     * Deserializes scalar value from XML node.
     *
     * @param \DOMElement $node Node to be deserialized.
     *
     * @return bool|float|int|string
     */
    private function _deserializeVar(\DOMElement $node)
    {
        switch ($node->getAttributeNS('urn:vaioni:serializer', 'type')) {
            case 'double':
                return doubleval($node->nodeValue);
            case 'string':
                return strval($node->nodeValue);
            case 'integer':
                return intval($node->nodeValue);
            case 'boolean':
                return $node->nodeValue == 'false' ? false : (bool)($node->nodeValue);
            default:
                return $node->nodeValue;
        }
    }

    /**
     * Deserialization helper.
     *
     * @param null|string $class Forced DAO class for object.
     * @return array|bool|float|int|null|string
     */
    private function _deserialize($class = null)
    {
        if ($this->_document->documentElement->hasAttributeNS('urn:vaioni:serializer', 'dao'))
            $this->dao = $this->_document->documentElement->getAttributeNS('urn:vaioni:serializer', 'dao');

        return $this->deserializeElement($this->_document->documentElement, $class);
    }
}