<?php

declare(strict_types=1);

namespace App\Serializer\Normalizer;

use App\Entity\Seller;
use Symfony\Component\Serializer\Encoder\NormalizationAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class SellerNormalizer extends AbstractNormalizer implements NormalizerInterface, NormalizationAwareInterface
{

    /**
     * {@inheritdoc}
     */
    public function normalize($object, string $format = null, array $context = [])
    {
        /** @var Seller $object */
        $data = [];
        $data['seller_id'] = $object->getSellerId();
        $data['is_confidential'] = $object->isConfidential();
        $data['seller_type'] = $object->getSellerType();
        $data['is_passthrough'] = $object->isPassthrough();
        $data['name'] = $object->getName();
        $data['domain'] = $object->getDomain();
        $data['comment'] = $object->getComment();
        $data['ext'] = $object->getExt();

        return $data;
    }
    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, string $format = null)
    {
        return $data instanceof Seller;
    }
}
