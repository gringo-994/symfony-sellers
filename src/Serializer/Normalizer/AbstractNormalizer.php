<?php

declare(strict_types=1);

namespace App\Serializer\Normalizer;

use App\Logger\LoggerTrait;
use App\Serializer\SerializerAppInterface;
use App\Serializer\SerializerTrait;
use ArrayUtilsInterface;
use ArrayUtilsTrait;
use CastUtilsInterface;
use CastUtilsTrait;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\SerializerInterface;

abstract class AbstractNormalizer implements SerializerAppInterface, ArrayUtilsInterface, CastUtilsInterface
{
    use SerializerTrait;
    use ArrayUtilsTrait;
    use CastUtilsTrait;
    use LoggerTrait;

    /**
     * AbstractSerializer constructor.
     */
    public function __construct(SerializerInterface $serializer, LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->serializer = $serializer;
    }
}
