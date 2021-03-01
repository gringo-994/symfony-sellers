<?php

declare(strict_types=1);

namespace App\Manager\Api;

use Symfony\Component\HttpFoundation\Response;

interface ResponseApiInterface
{
    public const TYPE_JSON = 'json';
    public const RESPONSE_HEADER_JSON = [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
    ];

    /**
     * @param null $data
     * @param int $code
     * @param string $message
     * @param string $type
     * @return Response
     */
    public function responseSuccess(
        $data = null,
        int $code = Response::HTTP_OK,
        string $message = 'success',
        $type = 'json'
    ): Response;

    /**
     * @param null $data
     * @param int $code
     * @param string $message
     * @param string $type
     * @return Response
     */
    public function responseError(
        $data = null,
        int $code = Response::HTTP_BAD_REQUEST,
        string $message = 'success',
        $type = 'json'
    ): Response;
}
