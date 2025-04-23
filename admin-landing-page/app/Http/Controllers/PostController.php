<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Menampilkan semua post
    public function index()
    {
        $posts = Post::all();  // Mengambil semua post
        return response()->json($posts);  // Mengembalikan dalam format JSON
    }

    // Menyimpan post baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;

        // Menyimpan gambar jika ada
        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('posts', 'public');
        }

        $post->save();

        return response()->json([
            'success' => true,
            'post' => $post
        ]);
    }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $post = Post::findOrFail($id);
    $post->title = $request->title;
    $post->content = $request->content;

    if ($request->hasFile('image')) {
        $post->image = $request->file('image')->store('posts', 'public');
    }

    $post->save();

    return response()->json([
        'success' => true,
        'post' => $post
    ]);
}


public function destroy($id)
{
    $post = Post::findOrFail($id);
    $post->delete();

    return response()->json([
        'success' => true
    ]);
}

}
