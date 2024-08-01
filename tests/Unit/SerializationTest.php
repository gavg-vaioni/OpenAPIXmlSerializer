<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Vaioni\OpenApiXmlSerializer\Xml;

final class SerializationTest extends TestCase
{
    public function testXmlSerializer(): void
    {
        $this->assertXmlStringEqualsXmlString(
            file_get_contents('tests/data/request.xml'),
            Xml::serialize(
                var: unserialize(base64_decode(file_get_contents('tests/data/request.ser'))),
            ),
        );
    }
}
