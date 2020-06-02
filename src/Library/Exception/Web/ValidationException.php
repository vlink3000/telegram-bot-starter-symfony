<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Library\Exception\Web;

use Telegram\Bot\Skeleton\Library\Exception\TelegramBotRuntimeException;

/**
 * Error thrown on invalid data received by endpoint from client
 */
class ValidationException extends TelegramBotRuntimeException
{
    // intentionally empty
}
