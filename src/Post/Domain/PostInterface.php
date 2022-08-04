<?php
declare(strict_types=1);

namespace Src\Post\Domain;

use Src\Post\Domain\Post;

interface PostInterface
{
    public function find(int $id): Post;
    public function findBySlug(string $slug): Post;
    public function findByTitle(string $title): Post;
    public function findAll(): array;
    public function create(string $title, string $content, string $slug): Post;
    public function update(int $id, string $title, string $content, string $slug): Post;
    public function delete(int $id): void;
}
