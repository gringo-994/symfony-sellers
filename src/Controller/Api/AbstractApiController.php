<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Manager\Api\ResponseApiInterface;
use App\Manager\Api\ResponseApiTrait;
use App\Serializer\SerializerAppInterface;
use App\Serializer\SerializerTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\SerializerInterface;

abstract class AbstractApiController extends AbstractController implements SerializerAppInterface, ResponseApiInterface
{
    use SerializerTrait;
    use ResponseApiTrait;

    /**
     * AbstractApiController constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }
}
