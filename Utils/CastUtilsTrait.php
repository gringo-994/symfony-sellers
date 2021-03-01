<?php

declare(strict_types=1);

namespace App\Utils;

use OutOfRangeException;

trait CastUtilsTrait
{
    /**
     * {@inheritdoc}
     * @throws OutOfRangeException
     */
    public static function castIntegerToBoolean(int $value): bool
    {
        if (0 === $value || 1 === $value) {
            return (bool) $value;
        }
        throw new OutOfRangeException('value must be 0 or 1');
    }
}
