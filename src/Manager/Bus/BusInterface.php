<?php

declare(strict_types=1);

namespace App\Manager\Bus;

use App\Message\MessageBusAppInterface;

interface BusInterface
{
    public function dispatch(MessageBusAppInterface $message): void;
}
