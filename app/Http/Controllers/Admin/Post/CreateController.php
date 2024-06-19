<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CreateController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.post.create', ['categories' => $categories]);
    }
}
