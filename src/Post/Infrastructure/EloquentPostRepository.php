<?php

declare(strict_types=1);

namespace Src\Post\Infrastructure;

use App\Models\Post as PostEloquentModel;
use Src\Post\Domain\Post;
use Src\Post\Domain\PostRepository;

class EloquentPostRepository implements PostRepository
{
    private PostEloquentModel $postEloquentModel;

    public function __construct()
    {
        $this->postEloquentModel = new PostEloquentModel();
    }

    public function findById(int $id): Post
    {
        $postEloquent = $this->postEloquentModel->query()->find($id);

        $postDomain = Post::create(
            $postEloquent['title'],
            $postEloquent['content'],
            $postEloquent['slug'],
            $postEloquent['category_id']);

        $postDomain->setId($postEloquent['id']);

        return $postDomain;
    }

    public function findBySlug(string $slug): Post
    {
        $postEloquent = $this->postEloquentModel->query()->find($slug);

        $postDomain = Post::create(
            $postEloquent['title'],
            $postEloquent['content'],
            $postEloquent['slug'],
            $postEloquent['category_id']);

        return $postDomain;
    }

    public function findByTitle(string $title): Post
    {
        $postEloquent = $this->postEloquentModel->query()->find($title);

        $postDomain = Post::create(
            $postEloquent['title'],
            $postEloquent['content'],
            $postEloquent['slug'],
            $postEloquent['category_id']);

        return $postDomain;
    }

    public function findAll(): array
    {
        $postsEloquent = PostEloquentModel::all();

        $postsDomain = [];
        foreach ($postsEloquent as $postEloquent) {
            $postsDomain[] = Post::create(
                $postEloquent['title'],
                $postEloquent['content'],
                $postEloquent['slug'],
                $postEloquent['category_id']);
        }

        return $postsDomain;
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
        $postEloquent = $this->postEloquentModel::query()->find($id);

        if (!$postEloquent) {
            throw new \DomainException('Post not found');
        }
        $postEloquent->delete();
    }
}
