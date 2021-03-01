<?php

declare(strict_types=1);

namespace App\Serializer;

use Symfony\Component\Serializer\SerializerInterface;

trait SerializerTrait
{
    protected SerializerInterface $serializer;

    /**
     * {@inheritdoc}
     */
    public function serialize($data, array $context = []): string
    {
        return $this->serializer->serialize($data, 'json', $context);
    }

    /**
     * {@inheritdoc}
     */
    public function deserialize($data, string $type, array $context = []): SerializeInterface
    {
        return $this->serializer->deserialize($data, $type, 'json', $context);
    }
}
