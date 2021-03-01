<?php

declare(strict_types=1);

namespace App\Manager\EntitySource;

use App\Entity\Seller;
use App\Manager\SellerManagerInterface;

interface SellerEntityManagerInterface extends SellerManagerInterface
{
    /**
     * @param string $domain
     * @return Seller[]
     */
    public function getSellersByDomain(string $domain): array;

    /**
     * @param Seller[] $sellers
     */
    public function massiveInsertion(array $sellers): void;
}
