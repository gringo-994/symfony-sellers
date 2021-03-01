<?php

namespace App\MessageHandler;

use App\Logger\LoggerTrait;
use App\Serializer\SerializerTrait;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class AbstractMessageHandler
{
    use LoggerTrait;
    use SerializerTrait;

    public function __construct(LoggerInterface $logger, SerializerInterface $serializer)
    {
        $this->logger = $logger;
        $this->serializer = $serializer;
    }
}
