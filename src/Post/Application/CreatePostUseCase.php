<?php

declare(strict_types=1);

namespace Src\Post\Application;

use Src\Post\Domain\Post;
use Src\Post\Domain\PostRepository;
use Src\Post\Domain\ValueObjects\PostContent;
use Src\Post\Domain\ValueObjects\PostSlug;
use Src\Post\Domain\ValueObjects\PostTitle;

final class CreatePostUseCase
{
    private PostRepository $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $PostTitle, string $PostContent, string $PostSlug): void
    {
        $title = new PostTitle($PostTitle);
        $content = new PostContent($PostContent);
        $slug = new PostSlug($PostSlug);

        $post = Post::create($title, $content, $slug);

        $this->repository->save($post);
    }
}
