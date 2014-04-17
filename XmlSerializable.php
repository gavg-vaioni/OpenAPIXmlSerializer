<?php
namespace Kadet\XmlSerializer;

interface XmlSerializable {
    public function toXml(\DOMElement $node, XmlSerializer $serializer);
    public static function fromXml(\DOMElement $node, XmlDeserializer $deserializer, &$result = null);
} 