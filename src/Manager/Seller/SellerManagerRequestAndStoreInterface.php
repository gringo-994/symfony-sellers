<?php

declare(strict_types=1);

namespace App\Manager\Seller;

use App\Entity\Seller;
use App\Manager\SellerManagerInterface;

interface SellerManagerRequestAndStoreInterface extends SellerManagerInterface
{
    /**
     * @param string $domain
     * @return Seller[]
     */
    public function requestSellersAndStore(string $domain): array;
}
