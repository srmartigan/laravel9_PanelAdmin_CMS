<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;


class PostController extends Controller
{

    public function index(): View
    {
        $posts = Post::Query()->where('user_id', auth()->id())->get();
        return view('admin.Post.index', compact('posts'));
    }

    public function create(): View
    {
        return view('admin.Post.index');
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $post = Post::query()->create([
            'title' => $request['title'],
            'slug' => $request['slug'],
            'content' => $request['content'],
            'user_id' => auth()->id(),
            'category_id' => $request['category_id'],
        ]);

        $post->save();
        return redirect()->route('admin.posts.index');

    }


    public function show(Post $post)
    {
        //
    }


    public function edit(Post $post): View
    {
        return view('admin.Post.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {

        $post->title = $request['title'];
        $post->slug = $request['slug'];
        $post->content = $request['content'];
        //$post->category_id = $request['category_id'];

        $post->save();
        return redirect()->route('admin.posts.index');
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
