<?php

declare(strict_types=1);

namespace Src\Post\Application;

use Src\Post\Domain\PostRepository;

final class DeletePostUseCase {

    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository) {
        $this->postRepository = $postRepository;
    }

    public function __invoke(int $id): void {

        $this->postRepository->delete($id);
    }
}
