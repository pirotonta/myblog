<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class HomeController extends Controller
{
    
    public function getHome(){
        $posts = Post::inRandomOrder()->paginate(10);
        return view('home', compact('posts'));
    }

}
