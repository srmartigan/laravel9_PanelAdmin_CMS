<?php

namespace Src\Category\Domain\ValueObjects;

class CategoryId
{
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function value(): int
    {
        return $this->id;
    }
}
