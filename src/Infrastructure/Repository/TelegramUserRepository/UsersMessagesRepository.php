<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Infrastructure\Repository\TelegramUserRepository;

use Telegram\Bot\Skeleton\Domain\Dto\UserDto;
use Telegram\Bot\Skeleton\Domain\Repository\UsersMessagesRepositoryInterface;
use Telegram\Bot\Skeleton\Infrastructure\DatabaseConnector;

class UsersMessagesRepository implements UsersMessagesRepositoryInterface
{
    private const TABLE_USERS = 'users';
    private const TABLE_LOGS= 'logs';

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
        $statement = $this->connector->getConnection();

        try {
            $statement->table(self::TABLE_USERS)->updateOrInsert(['user_telegram_id' => $userDto->getUserTelegramId()], [
                    'user_name' => $userDto->getUserName(),
                    'message' => $userDto->getMessage(),
                    'language_code' => $userDto->getLanguageCode(),
                    'last_request_at' => $userDto->getLastRequestAt()
                ]
            );
        } catch (\PDOException | \Exception $exception) {
            $statement->table(self::TABLE_LOGS)->insert([
                'message' => $exception->getMessage(),
                'time' => time()
            ]);
        }
    }
}