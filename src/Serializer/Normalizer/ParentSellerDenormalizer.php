<?php

declare(strict_types=1);

namespace App\Serializer\Normalizer;

use App\Entity\Seller;
use App\Exception\ArrayException;
use App\Exception\ValidationException;
use App\Model\Response\SellerResponse;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class ParentSellerDenormalizer extends AbstractNormalizer implements DenormalizerInterface
{
    /**
     * {@inheritdoc}
     *
     * @throws ValidationException
     */
    public function denormalize($data, string $type, string $format = null, array $context = [])
    {
        /* @var Seller[] $sellers */
        try {
            $obj = new SellerResponse();
            $obj->setContactEmail(self::getValueOrNull($data, 'contact_email'));
            $obj->setContactAddress(self::getValueOrNull($data, 'contact_address'));
            $obj->setVersion(self::getValueOrError($data, 'version'));

            $sellers = $this->deserialize(self::getValueOrError($data, 'sellers'), Seller::class);
            $obj->setSellers($sellers);
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
        return SellerResponse::class === $type;
    }
}
