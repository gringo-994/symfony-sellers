<?php

declare(strict_types=1);

use App\Exception\ArrayException;

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
     */
    public static function getBooleanOrError(array $data, string $key)
    {
        try {
            return self::castIntegerToBoolean(self::getValueOrError($data, $key));
        } catch (OutOfRangeException $e) {
            throw new ArrayException([$key => 'the value must be 0 or 1']);
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function getBooleanOrDefault(array $data, string $key, $default)
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
