<?php

declare(strict_types=1);

namespace App\Serializer\Normalizer;

use App\Model\Response\Api\ResponseApi;
use Symfony\Component\Serializer\Encoder\NormalizationAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class ResponseApiNormalizer extends AbstractNormalizer implements NormalizerInterface, NormalizationAwareInterface
{

    /**
     * {@inheritdoc}
     */
    public function normalize($object, string $format = null, array $context = [])
    {
        /** @var ResponseApi $object */
        $data = [];
        $data['status'] = $object->getStatus();
        $data['message'] = $object->getMessage();
        if (
            null !== $object->getData() &&
            is_array($object->getData()) &&
            count($object->getData()) > 0 &&
            is_object($object->getData()[0])
        ) {
            foreach ($object->getData() as $objItem) {
                $data['data'][] = $this->normalizerContext->handle($objItem);
            }
        } elseif (null !== $object->getData()) {
            $data['data'] = $object->getData();
        } else {
            $data['data'] = [];
        }
        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, string $format = null)
    {
        return $data instanceof ResponseApi;
    }
}
