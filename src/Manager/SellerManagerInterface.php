<?php

declare(strict_types=1);

namespace App\Manager;

use App\Entity\Seller;

interface SellerManagerInterface
{
    /**
     * @param string $domain
     * @return Seller[]
     */
    public function getSellersDomain(string $domain): array;
}
