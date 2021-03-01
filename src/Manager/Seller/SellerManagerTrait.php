<?php

declare(strict_types=1);

namespace App\Manager\Seller;

use App\Exception\ValidationException;
use App\Manager\SellerManagerInterface;

trait SellerManagerTrait
{
    protected SellerManagerInterface $sellerManager;

    /**
     * @param string $domain
     * @return array
     * @throws ValidationException
     */
    private function getSellers(string $domain): array
    {
        if (!empty($domain)) {
            return $this->sellerManager->getSellersDomain($domain);
        }
        throw new ValidationException(['domain' => 'domain is required and must be not empty']);
    }
}
