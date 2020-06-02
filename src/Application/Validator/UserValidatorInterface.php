<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Application\Validator;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

interface UserValidatorInterface
{
    /**
     * @param Request $request
     *
     * @throws UnprocessableEntityHttpException
     * @return array
     */
    public function validateUserRequest(Request $request): array;
}