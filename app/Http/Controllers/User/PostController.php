<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $posts = Post::where(function ($query) use ($search) {
            if (!empty($search)) {
                $query->where('title', 'like', '%' . $search . '%');
            }
        })->paginate(7);

        return view('user.post.index', compact('posts', 'search'));
    }

    public function show(Post $post)
    {
        $posts = Post::where('id', '!=', $post->id)->latest()->limit(4)->get();

        return view('user.post.show', compact('post', 'posts'));
    }
}
