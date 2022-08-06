<?php

namespace Src\Post\Application;

use Src\Post\Domain\PostRepository;

class AllPostUseCase
{
    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function __invoke(): array
    {
        return $this->postRepository->findAll();
    }
}
