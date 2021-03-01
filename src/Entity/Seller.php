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
final class Seller implements SerializeInterface, EntityInterface
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @var string
     * @Assert\NotBlank
     * @ORM\Column(type="string", length=255)
     */
    private string $sellerId;

    /**
     * @var bool
     * @ORM\Column(type="boolean", options={"default"=false})
     */
    private bool $isConfidential = false;

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\Choice(choices=Globals::SELLER_TYPES)
     * @ORM\Column(type="string",length=100)
     */
    private string $sellerType;
    /**
     * @var bool
     * @ORM\Column(type="boolean", options={"default"=false})
     */
    private bool $isPassthrough = false;

    /**
     * @var string|null
     * @Assert\Expression("not(!this.isConfidential() and this.getName()==null)")
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $name;
    /**
     * @var string|null
     * @Assert\Expression("not(!this.isConfidential() and this.getDomain()==null)")
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private ?string $domain;
    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $comment;
    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $ext;

    /**
     * Seller constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getSellerId(): string
    {
        return $this->sellerId;
    }

    /**
     * @param string $sellerId
     */
    public function setSellerId(string $sellerId): void
    {
        $this->sellerId = $sellerId;
    }

    /**
     * @return bool
     */
    public function isConfidential(): bool
    {
        return $this->isConfidential;
    }

    /**
     * @param bool $isConfidential
     */
    public function setIsConfidential(bool $isConfidential): void
    {
        $this->isConfidential = $isConfidential;
    }

    /**
     * @return string
     */
    public function getSellerType(): string
    {
        return $this->sellerType;
    }

    /**
     * @param string $sellerType
     */
    public function setSellerType(string $sellerType): void
    {
        $this->sellerType = $sellerType;
    }

    /**
     * @return bool
     */
    public function isPassthrough(): bool
    {
        return $this->isPassthrough;
    }

    /**
     * @param bool $isPassthrough
     */
    public function setIsPassthrough(bool $isPassthrough): void
    {
        $this->isPassthrough = $isPassthrough;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getDomain(): ?string
    {
        return $this->domain;
    }

    /**
     * @param string|null $domain
     */
    public function setDomain(?string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     */
    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return string|null
     */
    public function getExt(): ?string
    {
        return $this->ext;
    }

    /**
     * @param string|null $ext
     */
    public function setExt(?string $ext): void
    {
        $this->ext = $ext;
    }
}
