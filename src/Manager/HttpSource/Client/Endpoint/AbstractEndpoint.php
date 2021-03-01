<?php

declare(strict_types=1);

namespace App\Manager\HttpSource\Client\Endpoint;

use App\Utils\ArrayUtilsInterface;
use App\Utils\ArrayUtilsTrait;
use App\Utils\CastUtilsInterface;
use App\Utils\CastUtilsTrait;

abstract class AbstractEndpoint implements EndpointInterface, ArrayUtilsInterface, CastUtilsInterface
{
    use ArrayUtilsTrait;
    use CastUtilsTrait;

    /**
     * @var array
     */
    protected array $pathParams;

    /**
     * @var string
     */
    protected string $method;

    /**
     * @var array
     */
    protected array $headers;

    /**
     * @var array
     */
    protected array $options;

    /**
     * AbstractEndpoint constructor.
     */
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
    /**
     * {@inheritDoc}
     */
    public function getIsMock(): bool
    {
        return false;
    }
}
