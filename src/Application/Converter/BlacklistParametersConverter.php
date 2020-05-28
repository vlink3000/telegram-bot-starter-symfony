<?php declare(strict_types=1);

namespace Telegram\Bot\Skeleton\Application\Converter;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mime\Exception\InvalidArgumentException;
use Telegram\Bot\Skeleton\Domain\Dto\UserDto;

class BlacklistParametersConverter implements ParamConverterInterface
{
    /**
     * @param Request $request
     * @param ParamConverter $configuration
     * @throws InvalidArgumentException
     * @return bool
     */
    public function apply(Request $request, ParamConverter $configuration): bool
    {
        $name = $configuration->getName();

        $request->attributes->set(
            $name,
            new UserDto('test message')
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