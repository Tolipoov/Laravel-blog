<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;


class CreateController extends Controller
{
    public function index(){
        return view('admin.post.create');
    }
}
