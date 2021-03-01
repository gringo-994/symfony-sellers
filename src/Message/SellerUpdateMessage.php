<?php

declare(strict_types=1);

namespace App\Message;

use App\Entity\Seller;

class SellerUpdateMessage implements MessageBusAppInterface
{
    private string $id;
    /**
     * @var Seller[]
     */
    private array $sellers;

    /**
     * SellerUpdateMessage constructor.
     *
     * @param string $id
     * @param Seller[] $sellers
     */
    public function __construct(string $id, array $sellers)
    {
        $this->id = $id;
        $this->sellers = $sellers;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Seller[]
     */
    public function getSellers(): array
    {
        return $this->sellers;
    }

    /**
     * @param Seller[] $sellers
     */
    public function setSellers(array $sellers): void
    {
        $this->sellers = $sellers;
    }
}
