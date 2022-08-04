<?php

declare(strict_types=1);

namespace Src\Post\Domain\ValueObjects;

use InvalidArgumentException;

final class PostSlug
{
    private string $value;

    public function __construct(string $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    private function validate(string $value): void
    {
        if (empty($value)) {
            throw new InvalidArgumentException('PostSlug must be not empty');
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
