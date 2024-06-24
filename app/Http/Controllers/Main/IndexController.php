<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;


class IndexController extends Controller
{
    public function index(){
        $latest_posts = Post::latest()->paginate(3);
        return view('main.index', ["latest_posts" => $latest_posts]);
    }
}
