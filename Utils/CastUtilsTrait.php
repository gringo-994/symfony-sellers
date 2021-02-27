<?php
declare(strict_types=1);


trait CastUtilsTrait
{
    /**
     * {@inheritdoc}
     */
    public static function castIntegerToBoolean(int $value): bool
    {
        if ($value === 0 || $value === 1) {
            return (bool) $value;
        }
        throw new OutOfRangeException('value must be 0 or 1');
    }
}