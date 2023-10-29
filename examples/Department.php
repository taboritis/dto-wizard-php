<?php

declare(strict_types=1);

namespace Taboritis\DTO\Examples;

class Department
{
    public string $country;
    public string $address;

    /** @phpstan-ignore-next-line */
    private string $hash;

    public function getHash(): string
    {
        return $this->hash;
    }
}
