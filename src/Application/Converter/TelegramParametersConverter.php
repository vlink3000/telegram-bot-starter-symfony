<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Application\Converter;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Telegram\Bot\Skeleton\Domain\Dto\UserDto;
use Telegram\Bot\Skeleton\Domain\Factory\UserFactory;

class TelegramParametersConverter implements ParamConverterInterface
{
    /**
     * @var UserFactory
     */
    private $userFactory;

    /**
     * BlacklistParametersConverter constructor.
     *
     * @param $userFactory
     */
    public function __construct(UserFactory $userFactory)
    {
        $this->userFactory = $userFactory;
    }

    /**
     * @param Request $request
     * @param ParamConverter $configuration
     * @throws \InvalidArgumentException
     * @return bool
     */
    public function apply(Request $request, ParamConverter $configuration): bool
    {
        try {
            $userDto = $this->userFactory->createFromRequest($request);
        } catch (UnprocessableEntityHttpException $e) {
            throw new UnprocessableEntityHttpException($e->getMessage());
        }

        $request->attributes->set(
            $configuration->getName(),
            $userDto
        );

        return true;
    }

    /**
     * @param ParamConverter $configuration
     * @return bool
     */
    public function supports(ParamConverter $configuration): bool
    {
        return $configuration->getClass() === UserDto::class;
    }
}