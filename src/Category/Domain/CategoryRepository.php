<?php

declare(strict_types=1);

namespace Src\Category\Domain;

use Src\Category\Domain\ValueObjects\CategoryId;

interface CategoryRepository
{
    public function save(Category $category): void;
    public function update(Category $category): void;
    public function find(CategoryId $id): ?Category;
    public function delete(Category $category): void;
}
