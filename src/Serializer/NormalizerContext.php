<?php

declare(strict_types=1);

namespace App\Serializer;

use LogicException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class NormalizerContext implements NormalizerContextInterface
{
    /**
     * @var NormalizerInterface[]
     */
    private array $normalizers = [];

    /**
     * {@inheritDoc}
     */
    public function addNormalizerStrategy(NormalizerInterface $normalizer): void
    {
        $this->normalizers[] = $normalizer;
    }

    /**
     * {@inheritDoc}
     * @throws ExceptionInterface
     */
    public function handle(SerializeInterface $data)
    {
        foreach ($this->normalizers as $normalizer) {
            if ($normalizer->supportsNormalization($data)) {
                return $normalizer->normalize($data);
            }
        }
        throw new LogicException('normalizer not found for class' . get_class($data));
    }
}
