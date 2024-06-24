<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class SinglePostController extends Controller
{
    public function index(Post $post){
        $relationPosts = Post::where('category_id', $post->category_id)
        ->where('id', '!=', $post->id)
        ->get()
        ->take(3);
        return view('blog.single', ['post' => $post, 'relationPosts'=>$relationPosts]);
    }
}
