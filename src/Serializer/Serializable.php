<?php

namespace Invoicetic\Common\Serializer;

use Invoicetic\Common\Utility\Serializer;

trait Serializable
{
    public function serialize(string $format = 'json', array $context = []): string
    {
        return Serializer::serialize($this, $format, $context);
    }

    public static function denormalize(mixed $data, string $format = 'json', array $context = []): self
    {
        return Serializer::denormalize($data, self::class, $format, $context);
    }
}