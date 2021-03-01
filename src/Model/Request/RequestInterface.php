<?php

declare(strict_types=1);

namespace App\Model\Request;

interface RequestInterface
{
    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return string
     */
    public function getClientService(): string;

    /**
     * @return string
     */
    public function getDomain(): string;

    /**
     * @return string
     */
    public function getModel(): string;

    /**
     * @return array
     */
    public function getQueryParams(): array;

    /**
     * @return array
     */
    public function getPathParams(): array;
}
