<?php
declare(strict_types=1);


use App\Exception\ArrayException;

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
     * @throws ArrayException
     */
    public static function getValueOrError(array $data, string $key);

    /**
     * @param array $data
     * @param string $key
     * @return bool
     * @throws ArrayException
     */
    public static function getBooleanOrError(array $data, string $key): bool;
    /**
     * @param array $data
     * @param string $key
     * @param $default
     * @return mixed
     * @throws ArrayException
     */
    public static function getBooleanOrDefault(array $data, string $key, $default): bool;

    /**
     * @param array $data
     * @param string $key
     * @param $default
     * @return mixed
     */
    public static function getValueOrDefault(array $data, string $key, $default);
}