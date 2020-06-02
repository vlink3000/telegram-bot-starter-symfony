<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Domain\Handler;

use Telegram\Bot\Skeleton\Domain\Dto\UserDto;

interface ReadTelegramRequestHandlerInterface
{
    /**
     * @param UserDto $user
     *
     * @throws \InvalidArgumentException
     * @return void
     */
    public function __invoke(UserDto $user): void;
}