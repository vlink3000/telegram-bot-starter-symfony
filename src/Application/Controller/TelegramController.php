<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Application\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Telegram\Bot\Skeleton\Domain\Dto\UserDto;
use Telegram\Bot\Skeleton\Domain\Handler\ReadTelegramRequestHandlerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class TelegramController
{
    /**
     * @var ReadTelegramRequestHandlerInterface
     */
    private $readTelegramRequestHandler;

    public function __construct(
        ReadTelegramRequestHandlerInterface $readTelegramRequestHandler
    ) {
        $this->readTelegramRequestHandler = $readTelegramRequestHandler;
    }

    /**
     * @Route("/api/v1/telegram", methods={"POST"})
     * @ParamConverter(
     *     name="userDto",
     *     class="Telegram\Bot\Skeleton\Domain\Dto\UserDto"
     * )
     * @param UserDto $userDto
     * @return Response
     */
    public function readTelegramRequest(UserDto $userDto): Response
    {
        ($this->readTelegramRequestHandler)($userDto);
        return new Response();
    }
}