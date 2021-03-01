<?php

declare(strict_types=1);

namespace App\Manager\HttpSource\Client\Factory;

use App\Manager\HttpSource\Client\ClientInterface;
use App\Model\Request\RequestInterface;

interface ClientFactoryInterface
{
    public const CLIENT_SELLER = 'client_seller';

    /**
     * @param RequestInterface $request
     * @return ClientInterface
     */
    public function create(RequestInterface $request): ClientInterface;
}
