<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Application\Validator;

use Symfony\Component\HttpFoundation\Request;

interface UserValidatorInterface
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function validateUserRequest(Request $request): array;
}