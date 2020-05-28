<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Application\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Telegram\Bot\Skeleton\Domain\Dto\UserDto;
use Telegram\Bot\Skeleton\Domain\Handler\AddUserToBlacklistHandlerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class BlacklistController
{
    /**
     * @var AddUserToBlacklistHandlerInterface
     */
    private $addUserToBlacklistHandler;

    public function __construct(
        AddUserToBlacklistHandlerInterface $addUserToBlacklistHandler
    ) {
        $this->addUserToBlacklistHandler = $addUserToBlacklistHandler;
    }

    /**
     * @Route("/v1/user/{userId}/blacklist", methods={"POST"}, requirements={"userId"="[1-9]\d*"})
     * @ParamConverter(
     *     name="blacklistParametersConverter",
     *     class="Telegram\Bot\Skeleton\Domain\Dto\UserDto"
     * )
     * @param UserDto $userDto
     * @return Response
     */
    public function addUserToBlacklist(UserDto $userDto): Response
    {
        ($this->addUserToBlacklistHandler)($userDto);
        return new Response();
    }
}