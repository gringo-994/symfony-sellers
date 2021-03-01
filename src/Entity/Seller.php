<?php

declare(strict_types=1);

namespace App\Entity;

use App\Globals\Globals;
use App\Repository\SellerRepository;
use App\Serializer\SerializeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Seller.
 *
 * @ORM\Entity(repositoryClass=SellerRepository::class)
 */
class Seller implements SerializeInterface, EntityInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private string $sellerId;

    /**
     * @ORM\Column(type="boolean", options={"default"=false})
     */
    private bool $isConfidential = false;

    /**
     * @Assert\NotBlank
     * @Assert\Choice(choices=Globals::SELLER_TYPES)
     * @ORM\Column(type="string",length=100)
     */
    private string $sellerType;
    /**
     * @ORM\Column(type="boolean", options={"default"=false})
     */
    private bool $isPassthrough = false;

    /**
     * @Assert\Expression("not(!this.isConfidential() and this.getName()==null)")
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $name;
    /**
     * @Assert\Expression("not(!this.isConfidential() and this.getDomain()==null)")
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private ?string $domain;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $comment;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $ext;

    /**
     * Seller constructor.
     */
    public function __construct()
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getSellerId(): string
    {
        return $this->sellerId;
    }

    public function setSellerId(string $sellerId): void
    {
        $this->sellerId = $sellerId;
    }

    public function isConfidential(): bool
    {
        return $this->isConfidential;
    }

    public function setIsConfidential(bool $isConfidential): void
    {
        $this->isConfidential = $isConfidential;
    }

    public function getSellerType(): string
    {
        return $this->sellerType;
    }

    public function setSellerType(string $sellerType): void
    {
        $this->sellerType = $sellerType;
    }

    public function isPassthrough(): bool
    {
        return $this->isPassthrough;
    }

    public function setIsPassthrough(bool $isPassthrough): void
    {
        $this->isPassthrough = $isPassthrough;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getDomain(): ?string
    {
        return $this->domain;
    }

    public function setDomain(?string $domain): void
    {
        $this->domain = $domain;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    public function getExt(): ?string
    {
        return $this->ext;
    }

    public function setExt(?string $ext): void
    {
        $this->ext = $ext;
    }
}
