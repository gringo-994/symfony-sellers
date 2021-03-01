<?php

declare(strict_types=1);

namespace App\Model\Request;

use App\Manager\HttpSource\Client\ClientSellerInterface;
use App\Manager\HttpSource\Client\Factory\ClientFactoryInterface;
use App\Model\Response\SellerResponse;

final class RequestSellers implements RequestInterface
{
    private string $domain;

    /**
     * RequestSellers constructor.
     * @param string $domain
     */
    public function __construct(string $domain)
    {
        $this->domain = $domain;
    }

    /**
     *{@inheritDoc}
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     *{@inheritDoc}
     */
    public function getClientService(): string
    {
        return ClientSellerInterface::GET_SELLERS;
    }

    /**
     *{@inheritDoc}
     */
    public function getType(): string
    {
        return ClientFactoryInterface::CLIENT_SELLER;
    }

    /**
     * {@inheritDoc}
     */
    public function getQueryParams(): array
    {
        return [];
    }

    /**
     * {@inheritDoc}
     */
    public function getPathParams(): array
    {
        return [];
    }

    public function getModel(): string
    {
        return SellerResponse::class;
    }
}
