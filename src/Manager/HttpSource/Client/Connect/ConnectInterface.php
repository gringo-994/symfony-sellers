<?php

declare(strict_types=1);

namespace App\Manager\HttpSource\Client\Connect;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

interface ConnectInterface
{
    /**
     * @param int $timeout
     * @return ClientInterface
     */
    public function createClient(int $timeout = 10): ClientInterface;

    /**
     * @param string $method
     * @param string $uri
     * @param array $headers
     * @param array $query
     * @param array $options
     * @return ResponseInterface
     */
    public function performRequest(
        string $method,
        string $uri,
        array $headers = [],
        array $query = [],
        array $options = []
    ): ResponseInterface;
}
