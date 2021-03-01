<?php

declare(strict_types=1);

namespace App\Manager\HttpSource\Client\Endpoint;

interface EndpointInterface
{
    /**
     * @param array|mixed $pathParams
     */
    public function addPathParams(array $pathParams): void;

    /**
     * @return string
     */
    public function buildUri(): string;

    /**
     * @return string
     */
    public function getMethod(): string;

    /**
     * @return array
     */
    public function getHeaders(): array;

    /**
     * @return array
     */
    public function getOptions(): array;

    /**
     * @return bool
     */
    public function getIsMock(): bool;

    /**
     * @return string
     */
    public function getMock(): string;
}
