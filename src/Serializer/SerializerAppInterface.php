<?php

declare(strict_types=1);

namespace App\Serializer;

interface SerializerAppInterface
{
    /**
     * @param $data
     * @param array $context
     * @return string
     */
    public function serialize($data, array $context = []): string;

    /**
     * @param $data
     * @param string $type
     * @param array $context
     * @return SerializeInterface
     */
    public function deserialize($data, string $type, array $context = []): SerializeInterface;
}
