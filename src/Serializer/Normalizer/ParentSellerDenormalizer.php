<?php
declare(strict_types=1);


namespace App\Serializer\Normalizer;


use App\Entity\Seller;
use App\Exception\ArrayException;
use App\Exception\ValidationException;
use App\Model\SellerResponse;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class ParentSellerDenormalizer extends AbstractNormalizer implements DenormalizerInterface
{
    const ERROR_TAG="parent_object";
    /**
     * {@inheritdoc}
     * @throws ValidationException
     */
    public function denormalize($data, string $type, string $format = null, array $context = [])
    {
        /** @var Seller[] $sellers */
        try {
            $obj = new SellerResponse();
            $obj->setContactEmail(self::getValueOrNull($data, 'contact_email'));
            $obj->setContactAddress(self::getValueOrNull($data, 'contact_address'));
            $obj->setVersion(self::getValueOrError($data, 'version'));

            $sellers = $this->deserialize(self::getValueOrError($data, 'sellers'), Seller::class);
            $obj->setSellers($sellers);

        } catch (ArrayException $e) {
            throw new ValidationException([self::ERROR_TAG => $e->getErrors()]);
        }
        return $obj;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, string $type, string $format = null)
    {
        return $type === SellerResponse::class;
    }
}