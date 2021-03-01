<?php

declare(strict_types=1);

namespace App\Manager\Seller\Factory;

use App\Manager\AbstractManager;
use App\Manager\EntitySource\SellerEntityManagerInterface;
use App\Manager\HttpSource\SellerManagerHttpInterface;
use App\Manager\Seller\SellerManagerRequestAndStoreInterface;
use App\Manager\SellerManagerInterface;
use LogicException;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class SellerFactoryManager extends AbstractManager implements SellerFactoryManagerInterface
{
    private SellerManagerInterface $sellerManagerHttp;

    private SellerManagerInterface $sellerEntityManager;

    private SellerManagerInterface $sellerManagerRequestAndStore;

    public function __construct(
        ValidatorInterface $validator,
        LoggerInterface $logger,
        SerializerInterface $serializer,
        SellerManagerHttpInterface $sellerManagerHttp,
        SellerEntityManagerInterface $sellerEntityManager,
        SellerManagerRequestAndStoreInterface $sellerManagerRequestAndStore)
    {
        parent::__construct($validator, $logger, $serializer);
        $this->sellerManagerHttp = $sellerManagerHttp;
        $this->sellerEntityManager = $sellerEntityManager;
        $this->sellerManagerRequestAndStore = $sellerManagerRequestAndStore;
    }

    public function create(string $origin): SellerManagerInterface
    {
        switch ($origin) {
            case SellerFactoryManagerInterface::SELLER_FROM_DB:
                return $this->sellerEntityManager;
            case SellerFactoryManagerInterface::SELLER_FROM_REMOTE:
                return $this->sellerManagerHttp;
            case SellerFactoryManagerInterface::PERSIST_SELLER_FROM_REMOTE:
                return $this->sellerManagerRequestAndStore;
                break;
            default:
                throw new LogicException('origin:'.$origin.' is not defined');
        }
    }
}
