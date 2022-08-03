<?php

declare(strict_types=1);

namespace Src\Post\Domain;


class Post
{
    private int $id;
    private string $title;
    private string $content;
    private string $slug;

    private function __construct($title, $content, $slug)
    {
        $this->title = $title;
        $this->content = $content;
        $this->slug = $slug;
    }

    static function create($title, $content, $slug): Post
    {
        return new Post($title, $content, $slug);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

}

