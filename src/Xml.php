<?php

declare(strict_types=1);

namespace Vaioni\OpenApiXmlSerializer;

class Xml
{
    protected static XmlSerializer $serializer;
    protected static XmlDeserializer $deserializer;

    public static function serialize(mixed $var, string|null $tag = null): string
    {
        return static::serializer()(...func_get_args());
    }

    public static function deserialize(
        string $targetNamespace,
        mixed $xml,
        string|null $class = null,
    ): array|bool|float|int|object|string|null {
        return static::deserializer()(...func_get_args());
    }

    protected static function serializer(): XmlSerializer
    {
        return static::$serializer ?? new XmlSerializer();
    }

    protected static function deserializer(): XmlDeserializer
    {
        return static::$deserializer ?? new XmlDeserializer(...func_get_args());
    }
}
