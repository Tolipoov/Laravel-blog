<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::paginate(9);
        $latest_posts = Post::latest()->limit(8)->get();
        $late_posts = Post::latest()->limit(4)->get();
        return view('blog.index', ['posts' => $posts, "latest_posts" => $latest_posts, "late_posts" => $late_posts]);
    }
}
