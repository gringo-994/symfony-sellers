<?php

declare(strict_types=1);

namespace App\Manager\HttpSource\Client;

use App\Manager\HttpSource\Client\Connect\ConnectInterface;
use App\Manager\HttpSource\Client\Endpoint\EndpointSeller;
use Psr\Http\Message\ResponseInterface;

final class ClientSeller extends AbstractClient implements ClientSellerInterface
{
    /**
     * ClientSeller constructor.
     * @param ConnectInterface $connect
     */
    public function __construct(ConnectInterface $connect)
    {
        parent::__construct($connect);
    }

    /**
     * {@inheritDoc}
     */
    public function requestSeller(array $pathParams = [], array $queryParams = []): ResponseInterface
    {
        return parent::request(new EndpointSeller(), $pathParams, $queryParams);
    }
}
