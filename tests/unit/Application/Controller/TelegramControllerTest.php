<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Application\Controller;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Telegram\Bot\Skeleton\Domain\Dto\UserDto;
use Telegram\Bot\Skeleton\Domain\Handler\ReadTelegramRequestHandlerInterface;

class TelegramControllerTest extends TestCase
{
    use ProphecyTrait;

    /**
     * @var ReadTelegramRequestHandlerInterface
     */
    private $readTelegramRequestHandler;

    public function setUp(): void
    {
        $this->readTelegramRequestHandler = $this->prophesize(ReadTelegramRequestHandlerInterface::class);
    }

    private function getTestedObject(): TelegramController
    {
        return new TelegramController(
            $this->readTelegramRequestHandler->reveal());
    }

    public function testShouldHandleReadTelegramRequestMethod()
    {
        $userDto = $this->prophesize(UserDto::class)->reveal();
        $this->readTelegramRequestHandler->__invoke($userDto)->shouldBeCalledOnce();
        $this->getTestedObject()->readTelegramRequest($userDto);
    }
}