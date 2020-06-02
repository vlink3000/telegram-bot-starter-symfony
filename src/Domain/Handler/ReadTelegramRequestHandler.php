<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Domain\Handler;

use Telegram\Bot\Skeleton\Domain\Dto\UserDto;
use Telegram\Bot\Skeleton\Domain\Repository\UsersMessagesRepositoryInterface;

class ReadTelegramRequestHandler implements ReadTelegramRequestHandlerInterface
{
    private $userMessagesRepository;

    /**
     * ReadTelegramRequestHandler constructor.
     *
     * @param UsersMessagesRepositoryInterface $userMessagesRepository
     */
    public function __construct(
        UsersMessagesRepositoryInterface $userMessagesRepository
    ) {
        $this->userMessagesRepository = $userMessagesRepository;
    }

    /**
     * @param UserDto $userDto
     *
     * @throws \InvalidArgumentException
     * @return void
     */
    public function __invoke(UserDto $userDto): void
    {
        $this->userMessagesRepository->create($userDto);
    }
}