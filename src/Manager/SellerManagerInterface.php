<?php

declare(strict_types=1);

namespace App\Manager;

use App\Entity\Seller;

interface SellerManagerInterface
{
    /**
     * @return Seller[]
     */
    public function getSellersDomain(string $domain): array;
}
