<?php

declare(strict_types=1);

namespace App\Manager\HttpSource;

use App\Entity\Seller;
use App\Manager\SellerManagerInterface;

interface SellerManagerHttpInterface extends SellerManagerInterface
{
    /**
     * @param string $domain
     * @return Seller[]
     */
    public function requestSellersDomain(string $domain): array;
}
