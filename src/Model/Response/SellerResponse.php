<?php

declare(strict_types=1);

namespace App\Model\Response;

use App\Entity\Seller;
use App\Globals\Globals;
use App\Serializer\SerializeInterface;
use Symfony\Component\Validator\Constraints as Assert;

final class SellerResponse implements SerializeInterface
{
    /**
     * @Assert\Valid
     * @Assert\NotNull
     *
     * @var Seller[]
     */
    private array $sellers;

    private ?string $contactEmail;

    private ?string $contactAddress;
    /**
     * @Assert\NotBlank
     */
    private string $version;

    /**
     * ParentSeller constructor.
     */
    public function __construct()
    {
    }

    /**
     * @Assert\IsTrue(message="The version is invalid")
     */
    public function isVersionValid()
    {
        return Globals::VERSION_SELLER === $this->version;
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

    public function getContactEmail(): ?string
    {
        return $this->contactEmail;
    }

    public function setContactEmail(?string $contactEmail): void
    {
        $this->contactEmail = $contactEmail;
    }

    public function getContactAddress(): ?string
    {
        return $this->contactAddress;
    }

    public function setContactAddress(?string $contactAddress): void
    {
        $this->contactAddress = $contactAddress;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): void
    {
        $this->version = $version;
    }
}
