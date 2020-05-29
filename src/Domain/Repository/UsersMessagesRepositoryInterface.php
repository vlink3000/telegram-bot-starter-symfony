<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Domain\Repository;

use Telegram\Bot\Skeleton\Domain\Dto\UserDto;

interface UsersMessagesRepositoryInterface
{
    /**
     * @param UserDto $userDto
     */
    public function create(UserDto $userDto): void;
}