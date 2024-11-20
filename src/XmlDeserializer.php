<?php

declare(strict_types=1);

namespace Vaioni\OpenApiXmlSerializer;

use DOMDocument;
use DOMElement;
use DOMNode;
use DOMText;

class XmlDeserializer
{
    public static string $defaultClass = 'stdClass';
    private string $targetNamespace;

    public function __construct(
        private DOMDocument $document = new DOMDocument('1.0', 'UTF-8'),
    ) {
        $this->document->preserveWhiteSpace = false;
    }

    public function __invoke(string $targetNamespace, string $xml, string|null $class = null): array|bool|float|int|object|string|null
    {
        $this->targetNamespace = $targetNamespace;
        $this->document->loadXML($xml);

        $node = $this->document->documentElement->nodeName === 'soap:Envelope'
            ? $this->document->documentElement->firstChild->firstChild
            : $this->document->documentElement;

        return $this->deserializeElement($node, $class);
    }

    private function deserializeObject(DOMElement $node, string|null $class = null): object
    {
        if (! class_exists($class)) {
            $class = static::$defaultClass;
        }

        $object = new $class();

        if (method_exists($object, 'setters')) {
            $setters      = $class::setters();
            $attributeMap = array_flip($class::attributeMap());

            $missingNode = false;

            foreach ($node->childNodes as $child) {
                if (! isset($attributeMap[$child->nodeName])) {
                    $missingNode = true;
                    break;
                }

                $attribute = $attributeMap[$child->nodeName];
                $setter    = $setters[$attribute] ?? reset($setters);
                $object->$setter($this->deserializeElement($child));
            }

            if (!$missingNode) {
                return $object;
            }
        }

        foreach ($node->childNodes as $child) {
            $object->{$child->nodeName} = $this->deserializeElement($child);
        }

        return $object;
    }

    private function deserializeElement(
        DOMNode $node,
        string|null $class = null,
    ): array|bool|float|int|object|string {
        if ($node instanceof DOMText || $node->childElementCount === 0) {
            return $node->nodeValue;
        }

        if ($class !== null) {
            // If a class is given, assume we need to deserialize an object
            return $this->deserializeObject($node, $class);
        }

        // Guess the class name if none is given
        $class = $this->targetNamespace . '\\' . $node->nodeName;

        if (class_exists($class)) {
            return $this->deserializeObject($node, $class);
        }

        return $this->deserializeArray($node);
    }

    /** @return mixed[] */
    private function deserializeArray(DOMElement $node): array
    {
        return array_reduce(
            iterator_to_array($node->childNodes),
            function ($deserialized, $node) {
                $deserialized[$node->nodeName] ??= [];
                $deserialized[$node->nodeName][] = $this->deserializeElement($node);

                return $deserialized;
            },
            []
        );
    }
}
