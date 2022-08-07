<?php

declare(strict_types=1);

namespace Src\Post\Application;

use Src\Post\Domain\Post;
use Src\Post\Domain\PostRepository;

final class CreatePostUseCase
{
    private PostRepository $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $postTitle, string $postContent, string $postSlug, int $categoriaId): Post
    {
        $post = Post::create($postTitle, $postContent, $postSlug, $categoriaId);

        return $this->repository->save($post);
    }
}
