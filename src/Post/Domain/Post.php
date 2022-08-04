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

    private function __construct($title, $content, $slug)
    {
        $this->title = new PostTitle($title);
        $this->content = new PostContent($content);
        $this->slug = new PostSlug($slug);
    }

    static function create($title, $content, $slug): Post
    {
        return new Post($title, $content, $slug);
    }

    public function update(PostId $id, PostTitle $title, PostContent $content, PostSlug $slug): void
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->slug = $slug;
    }

    public function getId(): int
    {
        return $this->id->value();
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

