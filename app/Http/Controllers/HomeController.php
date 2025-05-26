<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class HomeController extends Controller
{
    
    public function getHome(){
        $posts = Post::orderBy('post_id', 'desc')->paginate(10);
        return view('home', compact('posts'));
    }

}
