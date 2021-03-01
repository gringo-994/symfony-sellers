<?php

declare(strict_types=1);

namespace App\Manager\Bus;

use App\Message\MessageBusAppInterface;
use Symfony\Component\Messenger\MessageBusInterface;

trait BusTrait
{
    /**
     * @var MessageBusInterface
     */
    protected MessageBusInterface $bus;

    /**
     * {@inheritDoc}
     */
    public function dispatch(MessageBusAppInterface $message): void
    {
        $this->bus->dispatch($message);
    }
}
