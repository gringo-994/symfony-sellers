<?php

declare(strict_types=1);

namespace App\Serializer\Normalizer;

use App\Serializer\SerializerAppInterface;
use App\Serializer\SerializerTrait;
use ArrayUtilsInterface;
use ArrayUtilsTrait;
use CastUtilsInterface;
use CastUtilsTrait;
use Symfony\Component\Serializer\SerializerInterface;

class AbstractNormalizer implements SerializerAppInterface, ArrayUtilsInterface, CastUtilsInterface
{
    use SerializerTrait, ArrayUtilsTrait, CastUtilsTrait;
    /**
     * AbstractSerializer constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

}