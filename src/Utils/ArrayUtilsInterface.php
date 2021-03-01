<?php

declare(strict_types=1);

namespace App\Utils;

interface ArrayUtilsInterface
{
    /**
     * @param array $data
     * @param string $key
     * @return mixed|null
     */
    public static function getValueOrNull(array $data, string $key);

    /**
     * @param array $data
     * @param string $key
     * @return mixed
     */
    public static function getValueOrError(array $data, string $key);

    /**
     * @param array $data
     * @param string $key
     * @return bool
     */
    public static function getBooleanOrError(array $data, string $key): bool;

    /**
     * @param array $data
     * @param string $key
     * @param $default
     *
     * @return mixed
     */
    public static function getBooleanOrDefault(array $data, string $key, $default): bool;

    /**
     * @param array $data
     * @param string $key
     * @param $default
     *
     * @return mixed
     */
    public static function getValueOrDefault(array $data, string $key, $default);
}
