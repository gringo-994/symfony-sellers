<?php

declare(strict_types=1);

namespace App\Utils;

interface CastUtilsInterface
{
    /**
     * @param int $value
     * @return bool
     */
    public static function castIntegerToBoolean(int $value);
}
