<?php

namespace Invoicetic\Common\Serializer;

use InvalidArgumentException;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class SerializerFactory
{
    private static array $serializers = [];

    protected const DEFAULT = 'DEFAULT';

    public static function get($type = self::DEFAULT)
    {
        if (!isset(self::$serializers[$type])) {
            self::$serializers[$type] = self::createSerializer($type);
        }

        return self::$serializers[$type];
    }

    public static function createSerializer($type): Serializer
    {
        return match ($type) {
            self::DEFAULT => self::createDefaultSerializer(),
            default => throw new InvalidArgumentException("Serializer $type not found"),
        };

    }

    public static function setSerializer($type, $serializer)
    {
        self::$serializers[$type] = $serializer;
    }

    protected static function createDefaultSerializer(): Serializer
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];

        $normalizers = [
            new ArrayDenormalizer(),
            new DateTimeNormalizer(),
            new ObjectNormalizer(null, null, null, new ReflectionExtractor())
        ];

        $serializer = new Serializer($normalizers, $encoders);
        return $serializer;
    }

}