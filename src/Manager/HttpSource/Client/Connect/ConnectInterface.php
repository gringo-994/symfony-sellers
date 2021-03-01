<?php

declare(strict_types=1);

namespace App\Manager\HttpSource\Client\Connect;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

interface ConnectInterface
{
    public function createClient(int $timeout = 10): ClientInterface;

    public function performRequest(
        string $method,
        string $uri,
        array $headers = [],
        array $query = [],
        array $options = []
    ): ResponseInterface;
}
