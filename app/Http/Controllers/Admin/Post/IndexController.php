<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;


class IndexController extends BaseController
{
    public function index(){
        $posts = Post::query()->with(['category', 'tags'])->get();
        return view('admin.post.index', ['posts' => $posts]);
    }
}
