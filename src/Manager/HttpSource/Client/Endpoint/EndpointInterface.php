<?php

declare(strict_types=1);

namespace App\Manager\HttpSource\Client\Endpoint;

interface EndpointInterface
{
    /**
     * @param array|mixed $pathParams
     */
    public function addPathParams(array $pathParams): void;

    public function buildUri(): string;

    public function getMethod(): string;

    public function getHeaders(): array;

    public function getOptions(): array;

    public function getIsMock(): bool;

    public function getMock(): string;
}
