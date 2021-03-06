<?php

declare(strict_types=1);

namespace App\Manager\HttpSource\Client\Connect;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

final class Connect implements ConnectInterface
{
    /**
     * @var string
     */
    private string $host;

    /**
     * Connect constructor.
     * @param string $host
     */
    public function __construct(string $host)
    {
        $this->host = $host;
    }

    /**
     * {@inheritDoc}
     */
    public function createClient(int $timeout = 30): ClientInterface
    {
        return new Client(['base_uri' => $this->host . '/', 'timeout' => $timeout]);
    }

    /**
     * {@inheritDoc}
     *
     * @throws GuzzleException
     */
    public function performRequest(
        string $method,
        string $uri,
        array $headers = [],
        array $query = [],
        array $options = []
    ): ResponseInterface {
        if (!empty($headers)) {
            $options['headers'] = $headers;
        }
        if (!empty($query)) {
            $options['query'] = $query;
        }
        return $this->createClient()->request($method, $uri, $options);
    }
}
