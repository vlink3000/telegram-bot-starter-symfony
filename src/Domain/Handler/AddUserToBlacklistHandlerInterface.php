<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Domain\Handler;

use Symfony\Component\Mime\Exception\InvalidArgumentException;
use Telegram\Bot\Skeleton\Domain\Dto\UserDto;

interface AddUserToBlacklistHandlerInterface
{
    /**
     * @param UserDto $user
     *
     * @throws InvalidArgumentException
     * @return void
     */
    public function __invoke(UserDto $user): void;
}