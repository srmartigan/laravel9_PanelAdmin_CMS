<?php

namespace Src\Category\Application;

use Src\Category\Domain\Category;
use Src\Category\Domain\CategoryRepository;

class CreateCategoryUseCase
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function __invoke(string $name, string $description): void
    {
        $category = Category::create($name, $description);
        $this->categoryRepository->save($category);
    }

}
