<?php

declare(strict_types=1);

namespace App\Manager\Bus;

use App\Message\MessageBusAppInterface;

interface BusInterface
{
    /**
     * @param MessageBusAppInterface $message
     */
    public function dispatch(MessageBusAppInterface $message): void;
}
