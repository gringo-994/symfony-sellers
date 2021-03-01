<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Seller;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * SellerRepository.
 */
final class SellerRepository extends ServiceEntityRepository
{
    /**
     * Constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Seller::class);
    }
}
