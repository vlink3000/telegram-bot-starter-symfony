<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Domain\Dto;

class UserDto
{
    /**
     * @var string
     */
    public $message;

    /**
     * UserDto constructor.
     *
     * @param string $message
     */
    public function __construct(
        string $message
    ) {
        $this->message = $message;
    }
}