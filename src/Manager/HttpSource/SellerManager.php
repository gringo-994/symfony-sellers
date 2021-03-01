<?php

declare(strict_types=1);

namespace App\Manager\HttpSource;

use App\Exception\ValidationException;
use App\Model\Request\RequestSellers;
use App\Model\Response\SellerResponse;

class SellerManager extends AbstractHttpManager implements SellerManagerHttpInterface
{
    /**
     * {@inheritDoc}
     *
     * @throws ValidationException
     */
    public function getSellersDomain(string $domain): array
    {
        return $this->requestSellersDomain($domain);
    }

    /**
     * {@inheritDoc}
     *
     * @throws ValidationException
     */
    public function requestSellersDomain(string $domain): array
    {
        /** @var SellerResponse $response */
        $response = $this->requestAndValidateResponse(new RequestSellers($domain));
        if (null != $response) {
            return $response->getSellers();
        }

        return [];
    }
}
