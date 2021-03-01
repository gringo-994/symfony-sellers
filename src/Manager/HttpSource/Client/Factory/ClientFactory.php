<?php

declare(strict_types=1);

namespace App\Manager\HttpSource\Client\Factory;

use App\Manager\HttpSource\Client\ClientInterface;
use App\Manager\HttpSource\Client\ClientSeller;
use App\Manager\HttpSource\Client\Connect\Connect;
use App\Model\Request\RequestInterface;
use App\Model\Request\RequestSellers;
use LogicException;

final class ClientFactory implements ClientFactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function create(RequestInterface $request): ClientInterface
    {
        switch ($request->getType()) {
            case ClientFactoryInterface::CLIENT_SELLER:
                if ($request instanceof RequestSellers) {
                    return new ClientSeller(new Connect($request->getDomain()));
                }
                throw new LogicException('request must be ' . RequestSellers::class);
            default:
                throw new LogicException('type ' . $request->getType() . ' is not defined');
        }
    }
}
