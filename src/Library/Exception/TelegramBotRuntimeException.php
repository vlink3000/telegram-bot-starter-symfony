<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Library\Exception;

/**
 * All Telegram Bot exceptions should inherit from this one.
 */
class TelegramBotRuntimeException extends \RuntimeException implements \JsonSerializable
{
    public function __construct(string $message, \Exception $previous = null)
    {
        parent::__construct($message, 0, $previous);
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'message' => $this->getMessage(),
            'type' => get_class($this),
            'stackTrace' => $this->getTraceAsString(),
        ];
    }
}