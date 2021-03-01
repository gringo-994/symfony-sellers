<?php

namespace App\Manager\Seller\Factory;

use App\Manager\SellerManagerInterface;

interface SellerFactoryManagerInterface
{
    public const REMOTE_SELLERS = 'remote_sellers';
    public const DB_SELLERS = 'db_sellers';
    public const PERSIST_REMOTE_SELLERS = 'persist_remote_sellers';

    /**
     * @param string $origin
     * @return SellerManagerInterface
     */
    public function create(string $origin): SellerManagerInterface;
}
