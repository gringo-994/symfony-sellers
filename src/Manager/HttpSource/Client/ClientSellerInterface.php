<?php

declare(strict_types=1);

namespace App\Manager\HttpSource\Client;

use Psr\Http\Message\ResponseInterface;

interface ClientSellerInterface
{
    const GET_SELLERS = 'requestSeller';

    public function requestSeller(array $pathParams = [], array $queryParams = []): ResponseInterface;
}
