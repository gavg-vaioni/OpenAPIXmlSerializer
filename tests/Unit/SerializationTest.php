<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Vaioni\OpenApiXmlSerializer\XmlSerializer;

final class SerializationTest extends TestCase
{
    public function testXmlSerializer(): void
    {
        $this->assertXmlStringEqualsXmlString(
            file_get_contents('tests/data/request.xml'),
            (new XmlSerializer())
            ->serialize(
                unserialize(base64_decode(file_get_contents('tests/data/request.ser'))),
            ),
        );
    }
}
