<?php

declare(strict_types=1);

namespace App\MessageHandler;

use App\Exception\ValidationException;
use App\Manager\EntitySource\SellerEntityManagerInterface;
use App\Message\SellerUpdateMessage;
use Exception;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Exception\UnrecoverableMessageHandlingException;
use Symfony\Component\Serializer\SerializerInterface;

class SellerUpdateHandler extends AbstractMessageHandler
{
    private SellerEntityManagerInterface $sellerEntityManager;

    /**
     * SellerUpdateHandler constructor.
     * @param LoggerInterface $logger
     * @param SellerEntityManagerInterface $sellerEntityManager
     * @param SerializerInterface $serializer
     */
    public function __construct(
        LoggerInterface $logger,
        SellerEntityManagerInterface $sellerEntityManager,
        SerializerInterface $serializer
    ) {
        parent::__construct($logger, $serializer);

        $this->sellerEntityManager = $sellerEntityManager;
    }

    /**
     * @param SellerUpdateMessage $message
     * @throws Exception
     */
    public function __invoke(SellerUpdateMessage $message)
    {
        try {
            $this->sellerEntityManager->massiveInsertion($message->getSellers());
        } catch (Exception $ex) {
            if ($ex instanceof ValidationException) {
                $this->logByException($ex, __METHOD__, json_encode($ex->getErrors()));
                throw new UnrecoverableMessageHandlingException();
            }
            $this->logByException($ex, __METHOD__);
            throw $ex;
        }
        $messageStr = 'massive insertion success [job_id:' . $message->getId() . ']';
        $this->logDebug($messageStr, __METHOD__, $this->serialize($message->getSellers()));
    }
}
