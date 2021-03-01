<?php

declare(strict_types=1);

namespace App\Listener;

use App\Exception\ValidationException;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\KernelEvents;

final class MiddlewareListener extends AbstractListener
{
    /**
     * @return array[]
     */
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => ['onKernelRequest', 9999],
            KernelEvents::RESPONSE => ['onKernelResponse', 9999],
            KernelEvents::EXCEPTION => ['onKernelException', 9999],
        ];
    }

    /**
     * @param ExceptionEvent $event
     */
    public function onKernelException(ExceptionEvent $event): void
    {
        $e = $event->getThrowable();
        $response = null;

        if ($e instanceof ValidationException) {
            $response = $this->responseError(json_encode($e->getErrors()));
        } elseif ($e instanceof HttpExceptionInterface) {
            $response = $this->responseError(null, $e->getStatusCode());
        } elseif ($e instanceof Exception) {
            if (getenv('APP_DEBUG_ENV') === 'false') {
                $response = $this->responseError(null, Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }

        if (null != $response) {
            $event->setResponse($response);
        }
        $this->setResponseCors($event->getResponse());
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        if (!$event->isMasterRequest()) {
            return;
        }

        $request = $event->getRequest();
        $method = $request->getRealMethod();

        if (Request::METHOD_OPTIONS === $method) {
            $response = new Response();
            $event->setResponse($response);
        }
    }

    /**
     * @param ResponseEvent $event
     */
    public function onKernelResponse(ResponseEvent $event): void
    {
        if (!$event->isMasterRequest()) {
            return;
        }

        $this->setResponseCors($event->getResponse());
    }

    /**
     * @param Response|null $response
     */
    private function setResponseCors(?Response $response)
    {
        if ($response) {
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->headers->set('Access-Control-Allow-Methods', 'GET,POST,PUT,PATCH');
            $response->headers->set('Access-Control-Allow-Headers', 'content-type');
        }
    }
}
