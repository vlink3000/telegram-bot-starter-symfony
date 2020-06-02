<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Domain\Factory;

use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Telegram\Bot\Skeleton\Application\Validator\UserValidatorInterface;
use Telegram\Bot\Skeleton\Domain\Dto\UserDto;
use Symfony\Component\HttpFoundation\Request;

class UserFactory
{
    /**
     * @var UserValidatorInterface
     */
    private $userValidator;

    /**
     * UserFactory constructor.
     *
     * @param $userValidator
     */
    public function __construct($userValidator)
    {
        $this->userValidator = $userValidator;
    }

    /**
     * @param Request $request
     *
     * @throws UnprocessableEntityHttpException
     * @return UserDto
     */
    public function createFromRequest(Request $request): UserDto
    {
        $validatedUser = $this->userValidator->validateUserRequest($request);

        $userDto = new UserDto();

        $userDto->setUserTelegramId($validatedUser['id']);
        $userDto->setUserName($validatedUser['first_name']);
        $userDto->setMessage($validatedUser['message']);
        $userDto->setLanguageCode($validatedUser['language_code']);
        $userDto->setLastRequestAt($validatedUser['last_request_at']);

        return $userDto;
    }
}