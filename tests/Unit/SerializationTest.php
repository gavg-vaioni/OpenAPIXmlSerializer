<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

final class SerializationTest extends TestCase
{
    public function testXmlSerializer()
    {
        $this->assertXmlStringEqualsXmlString(
            file_get_contents('tests/data/request.xml'),
            (new \Vaioni\OpenApiXmlSerializer\XmlSerializer())
            ->serialize(
                unserialize(base64_decode(file_get_contents('tests/data/request.ser')))
            )
        );
    }
}
