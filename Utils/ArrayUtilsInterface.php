<?php

declare(strict_types=1);

use App\Exception\ArrayException;

interface ArrayUtilsInterface
{
    /**
     * @return mixed|null
     */
    public static function getValueOrNull(array $data, string $key);

    /**
     * @return mixed
     *
     * @throws ArrayException
     */
    public static function getValueOrError(array $data, string $key);

    /**
     * @throws ArrayException
     */
    public static function getBooleanOrError(array $data, string $key): bool;

    /**
     * @param $default
     *
     * @return mixed
     *
     * @throws ArrayException
     */
    public static function getBooleanOrDefault(array $data, string $key, $default): bool;

    /**
     * @param $default
     *
     * @return mixed
     */
    public static function getValueOrDefault(array $data, string $key, $default);
}
