<?php

declare(strict_types=1);

namespace App\Serializer;


use Symfony\Component\Serializer\SerializerInterface;

trait SerializerTrait
{
    /**
     * @var SerializerInterface
     */
    private SerializerInterface $serializer;
    /**
     * {@inheritdoc}
     */
    public function serialize($data, $context = array()): string
    {
        return $this->serializer->serialize($data, 'json', $context);
    }
    /**
     * {@inheritdoc}
     */
    public function deserialize(string $data, string $type, $context = array()): SerializableInterface
    {
        return $this->serializer->deserialize($data, $type, 'json', $context);
    }
}