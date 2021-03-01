<?php

declare(strict_types=1);

namespace App\Serializer\Normalizer;

use App\Entity\Seller;
use App\Exception\ArrayException;
use App\Exception\ValidationException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

final class SellerDenormalizer extends AbstractNormalizer implements
    DenormalizerInterface,
    DenormalizerAwareInterface
{
    use DenormalizerAwareTrait;

    /**
     * {@inheritdoc}
     *
     * @throws ValidationException
     */
    public function denormalize($data, string $type, string $format = null, array $context = [])
    {
        try {
            $obj = new Seller();
            $obj->setSellerId(self::getValueOrError($data, 'seller_id'));
            $obj->setIsConfidential(self::getBooleanOrDefault($data, 'is_confidential', 0));
            $obj->setSellerType(self::getValueOrError($data, 'seller_type'));
            $obj->setIsPassthrough(self::getBooleanOrDefault($data, 'is_passthrough', 0));
            $obj->setName(self::getValueOrNull($data, 'name'));
            $obj->setDomain(self::getValueOrNull($data, 'domain'));
            $obj->setComment(self::getValueOrNull($data, 'comment'));
            $obj->setExt(self::getValueOrNull($data, 'ext'));
        } catch (ArrayException $e) {
            throw new ValidationException($e->getErrors());
        }

        return $obj;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, string $type, string $format = null)
    {
        return Seller::class === $type;
    }
}
