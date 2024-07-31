<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Vaioni\OpenApiXmlSerializer\XmlDeserializer;

final class DeserializationTest extends TestCase
{
    public function testXmlDeserializer()
    {
        $this->assertEqualsCanonicalizing(
            unserialize(base64_decode(file_get_contents('tests/data/response.ser'))),
            (new XmlDeserializer('\\Vaioni\\CityFibreAPI\\Model'))
            ->deserializeString(
                file_get_contents('tests/data/response.xml'),
                XmlDeserializer::$dao
            )
        );
    }
}