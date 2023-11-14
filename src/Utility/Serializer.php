<?php

namespace Invoicetic\Common\Utility;

use Invoicetic\Common\Serializer\SerializerFactory;

class Serializer
{

    private static ?\Symfony\Component\Serializer\Serializer $serializer = null;

    public static function serialize(mixed $data, string $format, array $context = [])
    {
        return self::getSerializer()->serialize($data, $format, $context);
    }

    public static function deserialize(mixed $data, string $type, string $format, array $context = [])
    {
        return self::getSerializer()->deserialize($data, $type, $format, $context);
    }

    public static function denormalize(mixed $data, string $type, string $format, array $context = [])
    {
        return self::getSerializer()->denormalize($data, $type, $format, $context);
    }

    public static function getSerializer(): \Symfony\Component\Serializer\Serializer
    {
        if (is_null(self::$serializer)) {
            self::$serializer = SerializerFactory::get();
        }

        return self::$serializer;
    }

}