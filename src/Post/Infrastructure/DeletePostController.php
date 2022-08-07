<?php

declare(strict_types=1);

namespace Src\Post\Infrastructure;

use Src\Post\Application\DeletePostUseCase;

class DeletePostController
{

    public function __construct()
    {}

    public function __invoke(int $id): void
    {
        $deletePostUseCase = new DeletePostUseCase(new EloquentPostRepository());
        $deletePostUseCase($id);
    }
}
