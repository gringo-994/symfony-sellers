<?php

declare(strict_types=1);

namespace App\Manager\HttpSource\Client;

use Psr\Http\Message\ResponseInterface;

interface ClientSellerInterface
{
    public const GET_SELLERS = 'requestSeller';

    /**
     * @param array $pathParams
     * @param array $queryParams
     * @return ResponseInterface
     */
    public function requestSeller(array $pathParams = [], array $queryParams = []): ResponseInterface;
}
