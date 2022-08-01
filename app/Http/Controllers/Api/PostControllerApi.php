<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostControllerApi extends Controller
{
    public function allPosts(Request $request)
    {
        $posts = Post::all();
        return response()->json($posts, 200);
    }
}
