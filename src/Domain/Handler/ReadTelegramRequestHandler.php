<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Domain\Handler;

use Symfony\Component\Mime\Exception\InvalidArgumentException;
use Telegram\Bot\Skeleton\Domain\Dto\UserDto;

class ReadTelegramRequestHandler implements ReadTelegramRequestHandlerInterface
{
    /**
     * @param UserDto $userDto
     *
     * @throws InvalidArgumentException
     * @return void
     */
    public function __invoke(UserDto $userDto): void
    {
        //TODO implement call to repository
    }
}