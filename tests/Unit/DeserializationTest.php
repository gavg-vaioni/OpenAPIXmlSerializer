<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Vaioni\OpenApiXmlSerializer\Xml;
use Vaioni\OpenApiXmlSerializer\XmlDeserializer;

final class DeserializationTest extends TestCase
{
    public function testXmlDeserializer(): void
    {
        $this->assertEqualsCanonicalizing(
            unserialize(base64_decode(file_get_contents('tests/data/response.ser'))),
            Xml::deserialize(
                targetNamespace: '\\Vaioni\\CityFibreAPI\\Model',
                xml: file_get_contents('tests/data/response.xml'),
                class: XmlDeserializer::$defaultClass,
            ),
        );
    }
}
