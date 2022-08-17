<?php

namespace Src\Category\Application;

use Src\Category\Domain\CategoryRepository;
use Src\Category\Domain\ValueObjects\CategoryId;

class DeleteCategoryUseCase
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function __invoke(int $id): void
    {
        $category = $this->categoryRepository->find(new CategoryId($id));
        $this->categoryRepository->delete($category);
    }
}
