<?php

declare(strict_types=1);

namespace App\Manager\HttpSource\Client;

use App\Manager\HttpSource\Client\Connect\ConnectInterface;
use App\Manager\HttpSource\Client\Endpoint\EndpointInterface;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractClient implements ClientInterface
{
    /**
     * @var ConnectInterface
     */
    private ConnectInterface $connect;

    /**
     * AbstractClient constructor.
     * @param ConnectInterface $connect
     */
    public function __construct(ConnectInterface $connect)
    {
        $this->connect = $connect;
    }

    /**
     * {@inheritDoc}
     */
    public function request(
        EndpointInterface $endpoint,
        array $pathParams = [],
        array $queryParams = []
    ): ResponseInterface {
        if (!empty($pathParams)) {
            $endpoint->addPathParams($pathParams);
        }

        if ($endpoint->getIsMock()) {
            return new Response(200, [], $endpoint->getMock());
        } else {
            return $this->connect->performRequest(
                $endpoint->getMethod(),
                $endpoint->buildUri(),
                $endpoint->getHeaders(),
                $queryParams,
            );
        }
    }
}
