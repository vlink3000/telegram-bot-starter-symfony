<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Domain\Dto;

class UserDto
{
    /**
     * @var int
     */
    private $userTelegramId;
    /**
     * @var string
     */
    private $userName;
    /**
     * @var string
     */
    private $message;
    /**
     * @var string
     */
    private $languageCode;
    /**
     * @var int
     */
    private $lastRequestAt;

    /**
     * @return int
     */
    public function getUserTelegramId(): int
    {
        return $this->userTelegramId;
    }

    /**
     * @param int $userTelegramId
     */
    public function setUserTelegramId(int $userTelegramId): void
    {
        $this->userTelegramId = $userTelegramId;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function getLanguageCode(): string
    {
        return $this->languageCode;
    }

    /**
     * @param string $languageCode
     */
    public function setLanguageCode(string $languageCode): void
    {
        $this->languageCode = $languageCode;
    }

    /**
     * @return int
     */
    public function getLastRequestAt(): int
    {
        return $this->lastRequestAt;
    }

    /**
     * @param int $lastRequestAt
     */
    public function setLastRequestAt(int $lastRequestAt): void
    {
        $this->lastRequestAt = $lastRequestAt;
    }
}