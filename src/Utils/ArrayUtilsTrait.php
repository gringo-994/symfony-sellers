<?php

declare(strict_types=1);

namespace App\Utils;

use App\Exception\ArrayException;
use OutOfRangeException;

trait ArrayUtilsTrait
{
    /**
     * {@inheritdoc}
     */
    public static function getValueOrNull(array $data, string $key)
    {
        return $data[$key] ?? null;
    }

    /**
     * {@inheritdoc}
     * @throws ArrayException
     */
    public static function getValueOrError(array $data, string $key)
    {
        if (array_key_exists($key, $data) && null !== $data[$key]) {
            return $data[$key];
        }
        throw new ArrayException([$key => 'the value must be defined']);
    }

    /**
     * {@inheritdoc}
     * @throws ArrayException
     */
    public static function getBooleanOrError(array $data, string $key): bool
    {
        try {
            return self::castIntegerToBoolean(self::getValueOrError($data, $key));
        } catch (OutOfRangeException $e) {
            throw new ArrayException([$key => 'the value must be 0 or 1']);
        }
    }

    /**
     * {@inheritdoc}
     * @throws ArrayException
     */
    public static function getBooleanOrDefault(array $data, string $key, $default): bool
    {
        try {
            return self::castIntegerToBoolean(self::getValueOrDefault($data, $key, $default));
        } catch (OutOfRangeException $e) {
            throw new ArrayException([$key => 'the value must be 0 or 1']);
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function getValueOrDefault(array $data, string $key, $default)
    {
        return $data[$key] ?? $default;
    }
}
