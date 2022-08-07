<?php

declare(strict_types=1);

namespace Src\Post\Application;

use Src\Post\Domain\Post;
use Src\Post\Domain\PostRepository;

class FindPostByIdUseCase
{
    private PostRepository $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $id): Post
    {
        return $this->repository->findById($id);
    }
}
