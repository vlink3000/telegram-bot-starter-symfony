<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Application\Validator;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Yaml;
use Telegram\Bot\Skeleton\Library\Exception\Web\ValidationException;

class UserValidator implements UserValidatorInterface
{
    /**
     * @param Request $request
     *
     * @throws ValidationException
     * @return array
     */
    public function validateUserRequest(Request $request): array
    {
        $keys = $this->getValidationKeys();

        $requestContent = json_decode($request->getContent(), true);
        $userData = $this->toFlattedArray($requestContent);

        foreach ($keys as $key) {
            if (!array_key_exists($key, $userData)) {
                throw new ValidationException('Invalid structure of user message.');
            }
        }

        return $userData;
    }

    /**
     * @param array $requestContent
     *
     * @return array
     */
    private function toFlattedArray(array $requestContent): array
    {
        $flattedArray = [];

        foreach ($requestContent as $key => $value) {
            if (is_array($value)){
                $flattedArray = array_merge($flattedArray, $this->toFlattedArray($requestContent));
            } else {
                $flattedArray[$key] = $value;
            }
        }

        return $flattedArray;
    }

    /**
     * @return array
     */
    private function getValidationKeys(): array
    {
        return Yaml::parseFile(dirname(__DIR__) . '/../../config/validation.yaml');
    }
}