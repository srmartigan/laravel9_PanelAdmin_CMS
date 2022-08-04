<?php

declare(strict_types=1);

namespace Src\Post\Application;

use Src\Post\Domain\Post;
use Src\Post\Domain\PostRepository;
use Src\Post\Domain\ValueObjects\PostId;
use Src\Post\Domain\ValueObjects\PostTitle;
use Src\Post\Domain\ValueObjects\PostContent;
use Src\Post\Domain\ValueObjects\PostSlug;

final class UpdatePostUseCase {

    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository) {
        $this->postRepository = $postRepository;
    }

    public function __invoke(int $id, string $title, string $content, string $slug): Post
    {
        $post = $this->postRepository->find($id);
        $post->update(
            new PostId($id),
            new PostTitle($title),
            new PostContent($content),
            new PostSlug($slug)
        );
        return $this->postRepository->Update($post);
    }
}
