<?php

declare(strict_types=1);

namespace App\Serializer\Normalizer;

use App\Logger\LoggerTrait;
use App\Serializer\NormalizerContextInterface;
use App\Utils\ArrayUtilsInterface;
use App\Utils\ArrayUtilsTrait;
use App\Utils\CastUtilsInterface;
use App\Utils\CastUtilsTrait;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\SerializerAwareTrait;

abstract class AbstractNormalizer implements ArrayUtilsInterface, CastUtilsInterface
{
    use ArrayUtilsTrait;
    use CastUtilsTrait;
    use LoggerTrait;
    use DenormalizerAwareTrait;
    use SerializerAwareTrait;

    /**
     * @var NormalizerContextInterface
     */
    protected NormalizerContextInterface $normalizerContext;

    /**
     * AbstractSerializer constructor.
     * @param LoggerInterface $logger
     * @param NormalizerContextInterface $normalizerContext
     */
    public function __construct(LoggerInterface $logger, NormalizerContextInterface $normalizerContext)
    {
        $this->logger = $logger;
        $this->normalizerContext = $normalizerContext;
    }
}
