<?php

declare(strict_types=1);

namespace App\Model\Response\Api;

use App\Serializer\SerializeInterface;

final class ResponseApi implements SerializeInterface
{
    private int $status;

    private string $message;
    /**
     * @var mixed
     */
    private $data;

    /**
     * ResponseApi constructor.
     *
     * @param mixed $data
     */
    public function __construct(int $status, string $message, $data = null)
    {
        $this->status = $status;
        $this->message = $message;
        $this->data = $data;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }
}
