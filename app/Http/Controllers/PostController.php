<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Src\Post\Infrastructure\CreatePostController;
use Src\Post\Infrastructure\DeletePostController;
use Src\Post\Infrastructure\UpdatePostController;

class PostController extends Controller
{

    public function index(): View
    {
        $posts = Post::Query()->where('user_id', auth()->id())->get();
        return view('admin.Post.index', compact('posts'));
    }

    public function create(): View
    {
        $categories = Category::all();
        return view('admin.Post.create', compact('categories'));
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $createPostController = new CreatePostController();
        $createPostController($request['title'], $request['content'], $request['slug'], (int)$request['category_id']);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');

    }


    public function show(Post $post)
    {
        //
    }


    public function edit(Post $post): View
    {
        $categories = Category::all();
        return view('admin.Post.edit', compact('post', 'categories'));
    }

    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $updatePostController = new UpdatePostController();
        $updatePostController($post['id'], $request['title'], $request['content'], $request['slug'], (int)$request['category_id']);
        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }


    public function destroy(Post $post): RedirectResponse
    {
       $deletePostController = new DeletePostController();
       $deletePostController($post['id']);

        return redirect()->route('admin.posts.index');
    }
}
