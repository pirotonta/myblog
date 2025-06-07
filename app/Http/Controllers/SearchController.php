<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post, User};

class SearchController extends Controller
{
    public function search(Request $request)
{
    $query = $request->input('q');

    $posts = Post::where('title', 'like', "%$query%")->limit(5)->get();
    $users = User::where('username', 'like', "%$query%")->limit(5)->get();

    return response()->json([
        'posts' => $posts,
        'users' => $users,
    ]);
}
}
