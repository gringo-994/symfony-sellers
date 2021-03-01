<?php

declare(strict_types=1);

namespace App\Manager\HttpSource\Client\Endpoint;

use ArrayUtilsInterface;
use ArrayUtilsTrait;
use CastUtilsInterface;
use CastUtilsTrait;

abstract class AbstractEndpoint implements EndpointInterface, ArrayUtilsInterface, CastUtilsInterface
{
    use ArrayUtilsTrait;
    use CastUtilsTrait;

    protected array $pathParams;

    private string $method;

    private array $headers;

    private array $options;

    public function __construct()
    {
    }

    /**
     * {@inheritDoc}
     */
    public function addPathParams(array $pathParams): void
    {
        $this->pathParams = $pathParams;
    }

    public function getIsMock(): bool
    {
        return false;
    }
}
