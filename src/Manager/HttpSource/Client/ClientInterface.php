<?php

declare(strict_types=1);

namespace App\Manager\HttpSource\Client;

use App\Manager\HttpSource\Client\Endpoint\EndpointInterface;
use Psr\Http\Message\ResponseInterface;

interface ClientInterface
{
    /**
     * @param EndpointInterface $endpoint
     * @param array $pathParams
     * @param array $queryParams
     * @return ResponseInterface
     */
    public function request(
        EndpointInterface $endpoint,
        array $pathParams = [],
        array $queryParams = []
    ): ResponseInterface;
}
