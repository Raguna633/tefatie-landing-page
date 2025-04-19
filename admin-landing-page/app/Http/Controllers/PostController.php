<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //
    public function index(){
        return response()->json(Post::all());
        $posts = Post::all();
        return view('blog.blog', compact('posts'));
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('uploads', 'public');
    }

    $post = Post::create([
        'title' => $request->title,
        'content' => $request->content,
        'image' => $imagePath
    ]);

    return response()->json([
        'status' => 'success',
        'data' => $post
    ]);
}


    public function show($id)
    {
        $post = Post::findOrFail($id);
        return response()->json($post);
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $post = Post::findOrFail($id);

    $post->title = $request->title;
    $post->content = $request->content;
    $post->save();

    return response()->json([
        'status' => 'success',
        'data' => $post
    ]);
}


   public function delete($id)
{
    $post = Post::findOrFail($id);

    // Hapus gambar dari storage
    if ($post->image && \Storage::disk('public')->exists($post->image)) {
        \Storage::disk('public')->delete($post->image);
    }

    $post->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'Artikel dan gambar berhasil dihapus!'
    ]);
}

}
