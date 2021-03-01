<?php

namespace App\Listener;

use App\Manager\Api\ResponseApiInterface;
use App\Manager\Api\ResponseApiTrait;
use App\Serializer\SerializerAppInterface;
use App\Serializer\SerializerTrait;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Serializer\SerializerInterface;

abstract class AbstractListener implements EventSubscriberInterface, ResponseApiInterface, SerializerAppInterface
{
    use SerializerTrait;
    use ResponseApiTrait;

    /**
     * AbstractListener constructor.
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }
}
