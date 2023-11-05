<?php

declare(strict_types=1);

namespace Taboritis\DTO\Examples;

/**
 * @template T of Post
 */
class Post
{
    /** @use FactoryMethod<T> */
    use FactoryMethod;

    public string $title;
    public string $body;
}
