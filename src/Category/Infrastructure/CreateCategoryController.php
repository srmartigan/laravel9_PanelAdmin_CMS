<?php

declare(strict_types=1);

namespace Src\Category\Infrastructure;


use Src\Category\Application\CreateCategoryUseCase;

final class CreateCategoryController
{
    public function __construct(){}

    public function __invoke(string $name, string $description): void
    {
        $createCategoryUseCase = new CreateCategoryUseCase(new EloquentCategoryRepository());
        $createCategoryUseCase($name, $description);
    }
}
