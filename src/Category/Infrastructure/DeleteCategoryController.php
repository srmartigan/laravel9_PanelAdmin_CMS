<?php

declare(strict_types=1);

namespace Src\Category\Infrastructure;

use Src\Category\Application\DeleteCategoryUseCase;

final class DeleteCategoryController
{
    public function __invoke(int $id): void
    {
        $deleteCategory = new DeleteCategoryUseCase(new EloquentCategoryRepository());
        $deleteCategory->__invoke($id);
    }
}
