<?php declare(strict_types=1);

namespace StepStone\Notifications\InspireJBE\App\Converter;

use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Telegram\Bot\Skeleton\Application\Converter\TelegramParametersConverter;
use Telegram\Bot\Skeleton\Application\Validator\UserValidatorInterface;
use Telegram\Bot\Skeleton\Domain\Dto\UserDto;
use Telegram\Bot\Skeleton\Domain\Factory\UserFactory;

class SubscriptionParametersConverterTest extends TestCase
{
    use ProphecyTrait;

    /**
     * @var ParamConverter
     */
    private $configuration;

    /**
     * @var UserFactory
     */
    private $userFactory;

    /**
     * @var UserValidatorInterface
     */
    private $validator;


    public function setUp(): void
    {
        $this->configuration = $this->prophesize(ParamConverter::class);
        $this->userFactory = $this->prophesize(UserFactory::class);
        $this->validator = $this->prophesize(UserValidatorInterface::class);
    }


    private function getTestedObject(): TelegramParametersConverter
    {
        return new TelegramParametersConverter(
            $this->userFactory->reveal()
        );
    }

    public function testApplyMethodShouldThrowUnprocessableEntityHttpException(): void
    {
        $paramName = 'testParam';
        $this->configuration->getName()->willReturn($paramName)->shouldBeCalled();

        $request = $this->prophesize(Request::class);
        $request->attributes = new ParameterBag([]);

        $this->userFactory->createFromRequest($request);

        $this->validator->validateUserRequest($request);


        $this->getTestedObject()->apply($request->reveal(), $this->configuration->reveal());

    }

//    /**
//     * @expectedException Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
//     */
//    public function testApplyMethodShouldThrowUnprocessableEntityHttpException(): void
//    {
//        $paramName = 'testParam';
//        $this->configuration->getName()->willReturn($paramName)->shouldBeCalled();
//
//        $request = $this->prophesize(Request::class);
//        $request->attributes = new ParameterBag([]);
//
//        $this->userFactory->createFromRequest($request)->willReturn($this->getUserDtoMock());
//
//        $this->getTestedObject()->apply($request->reveal(), $this->configuration->reveal());
//
//        $this->assertTrue($this->getTestedObject()->apply($request->reveal(), $this->configuration->reveal()));
//        $this->assertTrue($request->attributes->has($paramName));
//
//        $this->assertEquals(
//            $this->getUserDtoMock(),
//            $request->attributes->get($paramName)
//        );
//    }


    public function testShouldReturnUserDtoObject(): void
    {
        $this->configuration->getClass()->willReturn(UserDto::class)->shouldBeCalledOnce();
        $this->assertTrue($this->getTestedObject()->supports($this->configuration->reveal()));
    }

    private function getUserDtoMock(): UserDto
    {
        $userDto = new UserDto();
        $userDto->setMessage('Hello from vlink3000');
        $userDto->setLanguageCode('en');
        $userDto->setUserName('vlink3000');
        $userDto->setUserTelegramId(123456789);
        $userDto->setLastRequestAt(1011139200);

        return $userDto;
    }
}