<?php

declare(strict_types=1);

namespace Src\Post\Domain;


use Src\Post\Domain\ValueObjects\PostId;
use Src\Post\Domain\ValueObjects\PostTitle;
use Src\Post\Domain\ValueObjects\PostContent;
use Src\Post\Domain\ValueObjects\PostSlug;

class Post
{
    private PostId $id;
    private PostTitle $title;
    private PostContent $content;
    private PostSlug $slug;
    private int $categoryId;

    private function __construct(string $title, string $content, string $slug, int  $categoryId)
    {
        $this->title = new PostTitle($title);
        $this->content = new PostContent($content);
        $this->slug = new PostSlug($slug);
        $this->categoryId = $categoryId;
    }

    static function create($title, $content, $slug, $categoryId): Post
    {
        return new Post($title, $content, $slug, $categoryId);
    }

    public function update(PostId $id, PostTitle $title, PostContent $content, PostSlug $slug, int $categoryId): void
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->slug = $slug;
        $this->categoryId = $categoryId;
    }

    public function getId(): int
    {
        return $this->id->value();
    }
    public function setId(string $id): void
    {
        $this->id = new PostId((int)$id);
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }
    public function getTitle(): string
    {
        return $this->title->value();
    }

    public function getContent(): string
    {
        return $this->content->value();
    }

    public function getSlug(): string
    {
        return $this->slug->value();
    }

}

