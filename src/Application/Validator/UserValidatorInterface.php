<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Application\Validator;

use Symfony\Component\HttpFoundation\Request;
use Telegram\Bot\Skeleton\Library\Exception\Web\ValidationException;

interface UserValidatorInterface
{
    /**
     * @param Request $request
     *
     * @throws ValidationException
     * @return array
     */
    public function validateUserRequest(Request $request): array;
}