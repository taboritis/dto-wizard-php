<?php

declare(strict_types=1);

namespace Taboritis\DTO\Examples\Formatters;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Taboritis\DTO\Examples\User;
use Taboritis\DTO\Formatters\Context;
use Tests\Taboritis\DTO\TestCase;

#[CoversClass(Context::class)]
class ContextTest extends TestCase
{
    private Context $context;

    protected function setUp(): void
    {
        parent::setUp();
        $this->context = new Context();
    }

    #[Test]
    public function it_can_get_basic_context(): void
    {
        $mock = $this->createMock(\ReflectionProperty::class);

        $mock->expects($this->once())
            ->method('hasType')
            ->willReturn(false);

        $result = $this->context->getContext($mock);

        $this->assertEquals('default', $result);
    }

    #[Test]
    public function it_can_cast_to_array(): void
    {
        $mock = $this->createMock(\ReflectionProperty::class);

//        $mock->expects($this->once())
//            ->method('hasType')->willReturn(false);
//        $mock->expects($this->once())
//            ->method('getName')->willReturn('array');

        $result = $this->context->getContext($mock);

        $this->assertEquals('default', $result);
    }

    #[Test]
    public function it_can_cast_to_datetime(): void
    {
        $result = $this->context->getContext(new \ReflectionProperty(User::class, 'verified_at'));

        $this->assertEquals('datetime', $result);
    }

    #[Test]
    public function it_gets_object_context(): void
    {
        $result = $this->context->getContext(new \ReflectionProperty(User::class, 'department'));

        $this->assertEquals('object', $result);
    }

}
