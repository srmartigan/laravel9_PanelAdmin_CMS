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

    private PostRepository $repository;

    public function __construct(PostRepository $postRepository) {
        $this->repository = $postRepository;
    }

    public function __invoke(int    $id,
                             string $title,
                             string $content,
                             string $slug,
                             int    $categoryId): Post
    {
        $findPostByIdUseCase = new FindPostByIdUseCase($this->repository);
        $postDomain = $findPostByIdUseCase($id);

        //Creamos postDomain con los datos actualizados
        $postDomain->update(
            new PostId($id),
            new PostTitle($title),
            new PostContent($content),
            new PostSlug($slug),
            $categoryId
        );
        return $this->repository->Update($postDomain);
    }
}
