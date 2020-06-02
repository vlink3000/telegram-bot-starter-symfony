<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Application\Controller;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Telegram\Bot\Skeleton\Domain\Dto\UserDto;
use Telegram\Bot\Skeleton\Domain\Handler\ReadTelegramRequestHandler;
use Telegram\Bot\Skeleton\Domain\Repository\UsersMessagesRepositoryInterface;

class ReadTelegramRequestHandlerTest extends TestCase
{
    use ProphecyTrait;

    /**
     * @var UsersMessagesRepositoryInterface
     */
    private $usersMessagesRepository;

    public function setUp(): void
    {
        $this->usersMessagesRepository = $this->prophesize(UsersMessagesRepositoryInterface::class);
    }

    private function getTestedObject(): ReadTelegramRequestHandler
    {
        return new ReadTelegramRequestHandler($this->usersMessagesRepository->reveal());
    }

    public function testShouldHandleCreateMethodInRepository()
    {
        $user = new UserDto();
        $this->usersMessagesRepository->create($user)->shouldBeCalledOnce();
        ($this->getTestedObject())($user);
    }
}