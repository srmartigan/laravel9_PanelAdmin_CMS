<?php
declare(strict_types=1);

namespace Src\Post\Domain;

use Src\Post\Domain\Post;

interface PostRepository
{
    public function findById(int $id): Post;
    public function findBySlug(string $slug): Post;
    public function findByTitle(string $title): Post;
    public function findAll(): array;
    public function save(Post $postDomain): Post;
    public function update(Post $postDomain): Post;
    public function delete(int $id): void;
}
