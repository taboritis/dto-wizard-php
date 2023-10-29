<?php

declare(strict_types=1);

namespace Taboritis\DTO\Formatters;

interface FormatterInterface
{
    public function format(mixed $value): mixed;
}
