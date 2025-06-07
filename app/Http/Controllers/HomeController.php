<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class HomeController extends Controller
{

    public function getHome(Request $request)
    {
        $sort = $request->get('sort', 'latest');

        $posts = Post::with(['user', 'category'])
            ->sorted($sort)
            ->paginate(10)
            ->withQueryString();

        return view('home', compact('posts'));
    }
}
