<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

final class SerializationTest extends TestCase
{
    public function testXmlSerializer()
    {
        $object = unserialize(base64_decode(file_get_contents('tests/data/request.ser')));
        $result = (new \Vaioni\OpenApiXmlSerializer\XmlSerializer())->serialize($object);
        echo $result;
    }
}