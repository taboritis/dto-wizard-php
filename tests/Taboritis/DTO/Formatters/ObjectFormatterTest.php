<?php

declare(strict_types=1);

namespace Taboritis\DTO\Formatters;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Taboritis\DTO\Examples\Department;
use Taboritis\DTO\Examples\User;
use Tests\Taboritis\DTO\TestCase;

#[CoversClass(ObjectFormatter::class)]
class ObjectFormatterTest extends TestCase
{
    private ObjectFormatter $formatter;

    protected function setUp(): void
    {
        parent::setUp();
        $this->formatter = new ObjectFormatter();
    }
    #[Test]
    public function it_implements_formatter_interface(): void
    {
        $this->assertInstanceOf(FormatterInterface::class, $this->formatter);
    }

    #[Test]
    public function it_formats_to_class(): void
    {
        $department = $this->formatter->format(
            ['address' => $this->faker->address()],
            new \ReflectionProperty(User::class, 'department')
        );

        $this->assertInstanceOf(Department::class, $department);
    }
}
