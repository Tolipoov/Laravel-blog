<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;


class LikedController extends Controller
{
    public function index(){
        $posts = auth()->user()->likedPosts;
        return view('personal.liked.index', ['posts' => $posts]);
    }
}
