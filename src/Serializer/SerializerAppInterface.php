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
    public function serialize($data, $context = array()): string;

    /**
     * @param $data
     * @param $type
     * @param array $context
     * @return SerializableInterface
     */
    public function deserialize($data, $type, $context = array()): SerializableInterface;

}