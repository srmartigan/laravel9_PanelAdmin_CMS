<?php

declare(strict_types=1);

namespace Src\Post\Infrastructure;

use App\Models\Post as PostEloquentModel;
use Src\Post\Domain\Post;

class EloquentPostRepository implements \Src\Post\Domain\PostRepository
{
    private PostEloquentModel $postEloquentModel;

    public function __construct()
    {
        $this->postEloquentModel = new PostEloquentModel();
    }

    public function findById(int $id): Post
    {
        $postEloquent = $this->postEloquentModel->find($id);

        $postDomain = Post::create(
            $postEloquent->title,
            $postEloquent->content,
            $postEloquent->slug,
            $postEloquent->category_id);

        return $postDomain;
    }

    public function findBySlug(string $slug): Post
    {
        // TODO: Implement findBySlug() method.
    }

    public function findByTitle(string $title): Post
    {
        // TODO: Implement findByTitle() method.
    }

    public function findAll(): array
    {
        // TODO: Implement findAll() method.
    }


    public function save(Post $postDomain): Post
    {
        $postEloquent = $this->postEloquentModel::query()->create([
            'title' => $postDomain->getTitle(),
            'slug' => $postDomain->getSlug(),
            'content' => $postDomain->getContent(),
            'user_id' => auth()->id(),
            'category_id' => $postDomain->getCategoryId()
        ]);

        $postEloquent->save();

        return $postDomain;
    }

    public function update(Post $post): Post
    {
        $postEloquent = $this->postEloquentModel::query()->find($post->getId());
        $postEloquent['title'] = $post->getTitle();
        $postEloquent['slug'] = $post->getSlug();
        $postEloquent['content'] = $post->getContent();
        $postEloquent['category_id'] = $post->getCategoryId();
        $postEloquent->save();
        return $post;
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }
}
