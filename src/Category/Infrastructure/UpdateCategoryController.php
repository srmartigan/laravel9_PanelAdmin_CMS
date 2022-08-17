<?php

declare(strict_types=1);

namespace Src\Category\Infrastructure;


use Src\Category\Application\UpdateCategoryUseCase;

final class UpdateCategoryController
{

    public function __invoke(int $id, string $name, string $description): void
    {
        $updateCategoryUseCase = new UpdateCategoryUseCase(new EloquentCategoryRepository());
        $updateCategoryUseCase($id, $name, $description);
    }
}
