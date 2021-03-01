<?php

declare(strict_types=1);

namespace App\Manager\HttpSource;

use App\Model\Request\RequestInterface;
use App\Serializer\SerializeInterface;
use Psr\Http\Message\ResponseInterface;

interface MangerHttpInterface
{
    /**
     * @param bool $ignoreExceptions when ignoredException is true exception are logged but not passes through the method. recommended for commands
     *
     * @return ResponseInterface|null
     */
    public function requestAndValidateResponse(RequestInterface $request, $ignoreExceptions = false): ?SerializeInterface;
}
