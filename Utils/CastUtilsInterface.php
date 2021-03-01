<?php

declare(strict_types=1);

interface CastUtilsInterface
{
    /**
     * @return bool
     *
     * @throws OutOfRangeException
     */
    public static function castIntegerToBoolean(int $value);
}
