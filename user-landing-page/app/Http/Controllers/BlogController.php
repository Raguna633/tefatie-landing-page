<?php
// app/Http/Controllers/BlogController.php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('.index', compact('posts'));
    }

    public function show(Post $post)
    {
        // Pastikan post sudah dipublikasikan
        if (!$post->published_at || $post->published_at->isFuture()) {
            abort(404);
        }

        return view('blog.show', compact('post'));
    }
}
