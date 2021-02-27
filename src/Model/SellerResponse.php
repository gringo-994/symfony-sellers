<?php

declare(strict_types=1);

namespace App\Model;

use App\Entity\Seller;
use App\Globals\Globals;
use App\Serializer\SerializableInterface;
use Symfony\Component\Validator\Constraints as Assert;

class SellerResponse implements SerializableInterface
{
    /**
     * @Assert\Valid
     * @Assert\NotNull
     * @var Seller[]
     */
    private array $sellers;
    /**
     * @var string|null
     */
    private ?string $contactEmail;
    /**
     * @var string|null
     */
    private ?string $contactAddress;
    /**
     * @Assert\NotBlank
     * @var string
     */
    private string $version;

    /**
     * ParentSeller constructor.
     */
    public function __construct(){}

    /**
     * @Assert\IsTrue(message="The version is invalid")
     */
    public function isVersionValid()
    {
        return $this->version === Globals::VERSION_SELLER;
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

    /**
     * @return string|null
     */
    public function getContactEmail(): ?string
    {
        return $this->contactEmail;
    }

    /**
     * @param string|null $contactEmail
     */
    public function setContactEmail(?string $contactEmail): void
    {
        $this->contactEmail = $contactEmail;
    }

    /**
     * @return string|null
     */
    public function getContactAddress(): ?string
    {
        return $this->contactAddress;
    }

    /**
     * @param string|null $contactAddress
     */
    public function setContactAddress(?string $contactAddress): void
    {
        $this->contactAddress = $contactAddress;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion(string $version): void
    {
        $this->version = $version;
    }


}