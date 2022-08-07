<?php
declare(strict_types=1);

namespace Src\Category\Domain\ValueObjects;

class CategoryName
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function value(): string
    {
        return $this->name;
    }
}
