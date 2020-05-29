<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Application\Validator;

use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\HttpFoundation\Request;

class UserValidator implements UserValidatorInterface
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function validateUserRequest(Request $request): array
    {
        $keys = [
            'id',
            'first_name',
            'message',
            'language_code',
            'last_request_at'
        ];

        try{
            $userData = $this->toArray($request);
        } catch (InvalidArgumentException $exception){
            die($exception->getMessage());
        }

        foreach ($keys as $key) {
            if (!array_key_exists($key, $userData)) {
                $userData[$key] = "";
            }
        }

        return $userData;
    }

    /**
     * @param Request $request
     *
     * @throws InvalidArgumentException
     * @return array
     */
    private function toArray (Request $request): array
    {
        $request = json_decode($request->getContent(), true);

        if (
            isset($request['message']['from']) &&
            isset($request['message']['text']) &&
            isset($request['message']['date'])
        ) {

            $message['message'] = $request['message']['text'];
            $message['last_request_at'] = $request['message']['date'];

            return array_merge($request['message']['from'], $message);
        }

        throw new InvalidArgumentException('Invalid structure of user message.');
    }
}