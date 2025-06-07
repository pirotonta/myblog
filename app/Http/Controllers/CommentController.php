<?php

namespace App\Http\Controllers;
use App\Models\{Post, Comment};
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CommentController extends Controller
{
    use AuthorizesRequests;
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $post->comments()->create([
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Comentario publicado.');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment); 

        $comment->delete();

        return redirect()->back()->with('success', 'Comentario eliminado.');
    }
}
