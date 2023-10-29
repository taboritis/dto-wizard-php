<?php

declare(strict_types=1);

namespace Tests\Taboritis\DTO\Examples;

use Taboritis\DTO\Formatters\FormatterInterface;

class DefaultFormatter implements FormatterInterface
{
    public function format(mixed $value): mixed
    {
        return $value;
    }
}
