<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        $categorias = Category::all();
        return view('posts.create', compact('categorias'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $post->image_path = '/posts/' . $path;
        }

        $post->save();
        return redirect()->route('posts.show', $post->id)->with('success', 'Post actualizado correctamente.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category_id');
        // $post->user_id = auth()->id();
        $post->user_id = 1; //para testear siempre voy a usar el id 1

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $post->image_path = '/posts/' . $path;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post creado correctamente.');
    }
}
