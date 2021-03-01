<?php

declare(strict_types=1);

namespace App\Manager\EntitySource;

use App\Entity\Seller;
use App\Exception\ValidationException;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class SellerManager extends AbstractEntityManager implements SellerEntityManagerInterface
{
    public function __construct(
        ValidatorInterface $validator,
        LoggerInterface $logger,
        EntityManagerInterface $em,
        SerializerInterface $serializer)
    {
        parent::__construct($validator, $logger, $em, $serializer, Seller::class);
    }

    /**
     * {@inheritDoc}
     */
    public function getSellersDomain(string $domain): array
    {
        return $this->getSellersByDomain($domain);
    }

    /**
     * {@inheritDoc}
     */
    public function getSellersByDomain(string $domain): array
    {
        $query = Criteria::create()
            ->where(Criteria::expr()->eq('domain', $domain));

        return $this->matching($query);
    }

    /**
     * {@inheritDoc}
     *
     * @throws ValidationException
     */
    public function massiveInsertion(array $sellers): void
    {
        foreach ($sellers as $seller) {
            $this->persist($seller, false);
        }
        $this->flush();
    }
}
