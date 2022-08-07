<?php

declare(strict_types=1);

namespace Src\Category\Domain\ValueObjects;

class CategoryDescription
{
    private string $description;

    public function __construct(string $description)
    {
        $this->description = $description;
    }

    public function value(): string
    {
        return $this->description;
    }

}
