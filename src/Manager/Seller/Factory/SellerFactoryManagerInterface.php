<?php

namespace App\Manager\Seller\Factory;

use App\Manager\SellerManagerInterface;

interface SellerFactoryManagerInterface
{
    public const SELLER_FROM_REMOTE = 'request_seller_from_remote';
    public const SELLER_FROM_DB = 'request_seller_from_db';
    public const PERSIST_SELLER_FROM_REMOTE = 'persist_request_seller_from_remote';

    /**
     * @param string $origin
     * @return SellerManagerInterface
     */
    public function create(string $origin): SellerManagerInterface;
}
