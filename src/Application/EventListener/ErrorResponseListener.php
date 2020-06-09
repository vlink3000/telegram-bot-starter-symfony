<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Application\EventListener;

use Telegram\Bot\Skeleton\Domain\Exception\RepositoryException;
use Telegram\Bot\Skeleton\Library\Exception\Web\ValidationException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ErrorResponseListener implements EventSubscriberInterface
{
    /**
     * @return array
     */
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::EXCEPTION => ['onKernelException', 0]
        ];
    }

    public function onKernelException(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();
        switch (true) {
            case $exception instanceof ValidationException:
                $responseStatus = Response::HTTP_UNPROCESSABLE_ENTITY;
                break;
            case $exception instanceof RepositoryException:
                $responseStatus = Response::HTTP_BAD_GATEWAY;
                break;
            default:
                //handle only defined exceptions - the rest is handled by ServiceExceptionHandler
                return;
        }

        $response = new Response($exception->getMessage(), $responseStatus);
        $event->setResponse($response);
    }
}
