<?php

namespace App\Manager\Seller;

use App\Exception\ValidationException;
use App\Manager\AbstractManager;
use App\Manager\Bus\BusInterface;
use App\Manager\Bus\BusTrait;
use App\Manager\HttpSource\SellerManagerHttpInterface;
use App\Message\SellerUpdateMessage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class SellerManager extends AbstractManager implements SellerManagerRequestAndStoreInterface, BusInterface
{
    use SellerManagerTrait;
    use BusTrait;

    /**
     * SellerManager constructor.
     * @param ValidatorInterface $validator
     * @param LoggerInterface $logger
     * @param SerializerInterface $serializer
     * @param SellerManagerHttpInterface $sellerManager
     * @param MessageBusInterface $bus
     */
    public function __construct(
        ValidatorInterface $validator,
        LoggerInterface $logger,
        SerializerInterface $serializer,
        SellerManagerHttpInterface $sellerManager,
        MessageBusInterface $bus
    ) {
        parent::__construct($validator, $logger, $serializer);
        $this->sellerManager = $sellerManager;
        $this->bus = $bus;
    }

    /**
     * {@inheritDoc}
     * @throws ValidationException
     */
    public function getSellersDomain(string $domain): array
    {
        return $this->requestSellersAndStore($domain);
    }

    /**
     * {@inheritDoc}
     * @throws ValidationException
     */
    public function requestSellersAndStore(string $domain): array
    {
        $sellers = $this->getSellers($domain);
        $this->dispatch(new SellerUpdateMessage(uniqid(), $sellers));

        return $sellers;
    }
}
