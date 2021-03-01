<?php

declare(strict_types=1);

namespace App\Model\Request;

interface RequestInterface
{
    public function getType(): string;

    public function getClientService(): string;

    public function getDomain(): string;

    public function getModel(): string;

    public function getQueryParams(): array;

    public function getPathParams(): array;
}
