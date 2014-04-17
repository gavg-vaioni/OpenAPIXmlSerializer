<?php
/**
 * Copyright (C) 2014, Some right reserved.
 * @author Kacper "Kadet" Donat <kadet1090@gmail.com>
 * @license http://creativecommons.org/licenses/by-sa/4.0/legalcode CC BY-SA
 *
 * Contact with author:
 * Xmpp: kadet@jid.pl
 * E-mail: kadet1090@gmail.com
 *
 * From Kadet with love.
 */

namespace Kadet\XmlSerializer;

require_once 'functions.php';

class XmlDeserializer
{
    /**
     * @var \DOMDocument
     */
    private $_document;

    public $dao = 'stdClass';

    public function __construct() {
        $this->_document = new \DOMDocument();
        $this->_document->formatOutput = true;
        $this->_document->encoding = 'utf-8';
        $this->_document->preserveWhiteSpace = false;
    }

    private function _deserializeObject(\DOMElement $node, &$object = null)
    {
        if(!is_object($object)) {
            if(!is_string($object)) {
                $class = $node->getAttributeNS('urn:kadet:serializer', 'type');
                if(empty($class)) $class = $this->dao;
            }
            else
                $class = $object;

            $object = new $class;
        }

        $class = get_class($object);

        if(is_subclass_of($object, 'Kadet\\XmlSerializer\\XmlSerializable'))
            return $class::fromXml($node, $this, $object);

        $reflection  = new \ReflectionObject($object);
        $table = array();

        foreach($reflection->getProperties() as $property) {
            $property->setAccessible(true);
            $annotations = getAnnotations($property->getDocComment());

            if(isset($annotations['xml-skip'])) continue;
            if(isset($annotations['xml-attrib'])) {
                $name = !empty($annotations['xml-attrib']) ? $annotations['xml-attrib'] : $property->getName();
                $table['attrib'][$name] = $property;
            } else {
                $name = !empty($annotations['xml-tag']) ? $annotations['xml-tag'] : $property->getName();
                $table['child'][$name] = $property;
            }
        }

        foreach($node->attributes as $attribute) {
            if(isset($table['attrib'][$attribute->nodeName])) {
                $table['attrib'][$attribute->nodeName]->setValue($object, $attribute->nodeValue);

                if(!$table['attrib'][$attribute->nodeName]->isPublic())
                    $table['attrib'][$attribute->nodeName]->setAccessible(false);
            }
        }

        foreach($node->childNodes as $child) {
            if(isset($table['child'][$child->nodeName])) {
                $table['child'][$child->nodeName]->setValue($object, $this->deserializeElement($child));

                if(!$table['child'][$child->nodeName]->isPublic())
                    $table['child'][$child->nodeName]->setAccessible(false);
            } elseif ($child instanceof \DOMElement) {
                $object->{$child->nodeName} = $this->deserializeElement($child);
            }
        }

        return $object;
    }

    public function deserializeElement(\DOMElement $node, &$object = null) {
        $type = $node->getAttributeNS('urn:kadet:serializer', 'type');

        if($type == 'array')
            return $this->_deserializeArray($node, $object);
        elseif(class_exists($type) || $node->firstChild instanceof \DOMElement)
            return $this->_deserializeObject($node, $object);
        else
            return $this->_deserializeVar($node, $object);
    }

    public function deserializeString($xml, &$object = null)
    {
        $this->_document->loadXML($xml);
        return $this->_deserialize($object);
    }

    public function deserializeFile($file, &$object = null)
    {
        $this->_document->load($file);
        return $this->_deserialize($object);
    }

    private function _deserializeArray(\DOMElement $node, array &$array = null)
    {
        if($array === null)
            $array = array();

        foreach($node->childNodes as $element)
            $array[$element->getAttributeNS('urn:kadet:serializer', 'key')] = $this->deserializeElement($element);

        return $array;
    }

    private function _deserializeVar(\DOMElement $node, &$var = null)
    {
        switch($node->getAttributeNS('urn:kadet:serializer', 'type')) {
            case 'double':
                return $var = doubleval($node->nodeValue);
            case 'string':
                return $var = strval($node->nodeValue);
            case 'integer':
                return $var = intval($node->nodeValue);
            case 'boolean':
                return $var = boolval($node->nodeValue);
            default:
                return $var = $node->nodeValue;
        }
    }

    /**
     * @param null $object
     *
     * @return array|bool|float|int|null|string
     */
    private function _deserialize(&$object = null)
    {
        if ($this->_document->documentElement->hasAttributeNS('urn:kadet:serializer', 'dao'))
            $this->dao = $this->_document->documentElement->getAttributeNS('urn:kadet:serializer', 'dao');

        return $this->deserializeElement($this->_document->documentElement, $object);
    }
} 