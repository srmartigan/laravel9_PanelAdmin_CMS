<?php

declare(strict_types=1);

namespace Src\Post\Infrastructure;

use Src\Post\Application\UpdatePostUseCase;
use Src\Post\Domain\Post;

class UpdatePostController
{
    public function __construct()
    {
    }

    public function __invoke(int $id, string $title, string $content, string $slug, int $categoriaId): Post
    {
           $updatePostUseCase = new UpdatePostUseCase(new EloquentPostRepository());
           $post = $updatePostUseCase->__invoke($id, $title, $content, $slug, $categoriaId);
           return $post;
    }
}
