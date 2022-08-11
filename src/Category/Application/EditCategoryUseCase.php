<?php

namespace Src\Category\Application;

use Src\Category\Domain\CategoryRepository;
use Src\Category\Domain\ValueObjects\CategoryDescription;
use Src\Category\Domain\ValueObjects\CategoryId;
use Src\Category\Domain\ValueObjects\CategoryName;

class EditCategoryUseCase
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function __invoke(string $id, string $name, string $description): void
    {
        $category = $this->categoryRepository->find(new CategoryId($id));
        $category->update(new CategoryId($id), new CategoryName($name), new CategoryDescription($description));
        $this->categoryRepository->save($category);
    }
}
