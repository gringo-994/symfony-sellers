<?php

declare(strict_types=1);

namespace App\Serializer;

interface SerializerAppInterface
{
    /**
     * @param $data
     */
    public function serialize($data, array $context = []): string;

    /**
     * @param $data
     * @param $type
     */
    public function deserialize($data, string $type, array $context = []): SerializeInterface;
}
