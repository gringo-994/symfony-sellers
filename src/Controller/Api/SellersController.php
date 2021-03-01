<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Exception\ValidationException;
use App\Manager\Seller\Factory\SellerFactoryManagerInterface;
use App\Manager\Seller\SellerManagerTrait;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route as Rest;
use Symfony\Component\Serializer\SerializerInterface;

class SellersController extends AbstractApiController implements SellersControllerInterface
{
    use SellerManagerTrait;

    /**
     * SellersController constructor.
     * @param SerializerInterface $serializer
     * @param SellerFactoryManagerInterface $factoryManager
     */
    public function __construct(SerializerInterface $serializer, SellerFactoryManagerInterface $factoryManager)
    {
        parent::__construct($serializer);
        $this->sellerManager = $factoryManager->create(SellerFactoryManagerInterface::PERSIST_SELLER_FROM_REMOTE);
    }

    /**
     * @Rest("sellers/check-in", methods={"GET", "HEAD"} ,name="sellers_check_in")
     * {@inheritDoc}
     * @throws ValidationException
     */
    public function sellersCheckIn(Request $request): Response
    {
        return $this->responseSuccess($this->getSellers($request->get('domain')));
    }
}
