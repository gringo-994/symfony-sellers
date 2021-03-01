<?php

declare(strict_types=1);

namespace App\Manager\Api;

use App\Model\Response\Api\ResponseApi;
use LogicException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ResponseApiTrait
{
    /**
     * {@inheritDoc}
     */
    public function responseSuccess(
        $data = null,
        int $code = Response::HTTP_OK,
        string $message = 'success',
        $type = 'json'): Response
    {
        return $this->response($data, $code, $message, $type);
    }

    /**
     * {@inheritDoc}
     */
    public function responseError(
        $data = null,
        int $code = Response::HTTP_BAD_REQUEST,
        string $message = 'failed',
        $type = 'json'): Response
    {
        return $this->response($data, $code, $message, $type);
    }

    /**
     * @param null   $data
     * @param string $type
     *
     * @return JsonResponse
     */
    public function response(
        $data = null,
        int $code = Response::HTTP_OK,
        string $message = 'success',
        $type = 'json')
    {
        switch ($type) {
            case ResponseApiInterface::TYPE_JSON:
                return new JsonResponse(
                    $this->serialize(new ResponseApi($code, $message, $data)),
                    $code,
                    ResponseApiInterface::RESPONSE_HEADER_JSON,
                    true
                );
            default:
                throw new LogicException('type:'.$type.' is not defined');
        }
    }
}
