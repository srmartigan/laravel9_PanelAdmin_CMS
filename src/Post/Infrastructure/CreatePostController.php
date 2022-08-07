<?php

declare(strict_types=1);

namespace Src\Post\Infrastructure;

use Src\Post\Application\CreatePostUseCase;
use Src\Post\Domain\Post;

final class CreatePostController {

    public function __construct(){}

    /*  String $title   ⇨ Cadena con el título del Post.
        String $content ⇨ Cadena con el contenido del Post.
        String $slug    ⇨ Cadena con el slug del Post. */
    public function __invoke(string $title, string $content, string $slug, int $categoriaId): Post
    {
        $createPostUseCase = new CreatePostUseCase(new EloquentPostRepository());
        return $createPostUseCase($title, $content, $slug, $categoriaId);
    }

}
