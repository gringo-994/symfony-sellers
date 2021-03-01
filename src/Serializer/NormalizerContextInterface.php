<?php

declare(strict_types=1);

namespace App\Serializer;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

interface NormalizerContextInterface
{
    /**
     * @param NormalizerInterface $strategy
     */
    public function addNormalizerStrategy(NormalizerInterface $strategy): void;
    /**
     * @param SerializeInterface $data
     */
    public function handle(SerializeInterface $data);
}
