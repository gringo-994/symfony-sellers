<?php

declare(strict_types=1);

namespace App\Manager\HttpSource;

use App\Exception\ValidationException;
use App\Manager\AbstractManager;
use App\Manager\HttpSource\Client\Factory\ClientFactoryInterface;
use App\Model\Request\RequestInterface;
use App\Serializer\SerializeInterface;
use Exception;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class AbstractHttpManager extends AbstractManager implements MangerHttpInterface
{
    /**
     * @var ClientFactoryInterface
     */
    private ClientFactoryInterface $clientFactory;

    /**
     * AbstractHttpManager constructor.
     * @param ClientFactoryInterface $clientFactory
     * @param ValidatorInterface $validator
     * @param LoggerInterface $logger
     * @param SerializerInterface $serialize
     */
    public function __construct(
        ClientFactoryInterface $clientFactory,
        ValidatorInterface $validator,
        LoggerInterface $logger,
        SerializerInterface $serialize
    ) {
        parent::__construct($validator, $logger, $serialize);
        $this->clientFactory = $clientFactory;
    }

    /**
     * {@inheritDoc}
     *
     * @throws ValidationException
     */
    public function requestAndValidateResponse(
        RequestInterface $request,
        $ignoreExceptions = false
    ): ?SerializeInterface {
        try {
            $client = $this->clientFactory->create($request);
            $service = $request->getClientService();
            $response = $client->$service($request->getPathParams(), $request->getQueryParams());

            $objResponse = $this->deserialize($response, $request->getModel());
            $this->handleValidation($objResponse);

            return $objResponse;
        } catch (Exception $ex) {
            $extras = [];
            if ($ex instanceof ValidationException) {
                $extras = $ex->getErrors();
            }
            $this->logByException($ex, __METHOD__, json_encode($extras));
            if ($ignoreExceptions) {
                return null;
            }
            throw $ex;
        }
    }
}
