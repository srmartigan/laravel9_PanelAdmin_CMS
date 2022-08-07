<?php

declare(strict_types=1);

namespace Src\Category\Domain;

use Src\Category\Domain\ValueObjects\CategoryDescription;
use Src\Category\Domain\ValueObjects\CategoryId;
use Src\Category\Domain\ValueObjects\CategoryName;

class Category
{
    private CategoryId $id;
    private CategoryName $name;
    private CategoryDescription $description;

    private function __construct(string $name, string $description)
    {
        $this->name = new CategoryName($name);
        $this->description = new CategoryDescription($description);
    }

    public static function create(string $name, string $description): self
    {
        return new self($name, $description);
    }

    public function update(CategoryId $id, CategoryName $name, CategoryDescription $description): void
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }

    public function id(): CategoryId
    {
        return $this->id;
    }

    public function name(): CategoryName
    {
        return $this->name;
    }

    public function description(): CategoryDescription
    {
        return $this->description;
    }

}
