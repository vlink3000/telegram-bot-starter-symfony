<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Infrastructure\Repository\TelegramUserRepository;

use Telegram\Bot\Skeleton\Domain\Dto\UserDto;
use Telegram\Bot\Skeleton\Domain\Repository\UsersMessagesRepositoryInterface;
use Telegram\Bot\Skeleton\Infrastructure\DatabaseConnector;

class UsersMessagesRepository implements UsersMessagesRepositoryInterface
{
    private const TABLE_USERS = 'users';

    private $connector;

    /**
     * UsersMessagesRepository constructor.
     *
     * @param DatabaseConnector $connector
     */
    public function __construct(DatabaseConnector $connector)
    {
        $this->connector = $connector;
    }

    /**
     * @param UserDto $userDto
     */
    public function create(UserDto $userDto): void
    {
        //$connection = $this->connector->getConnection();
        //$connection->table(self::TABLE_USERS);
    }
}