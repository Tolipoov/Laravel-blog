<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class IndexController extends Controller
{
    public function index(){
        $tags = Tag::all();
        return view('admin.tag.index', ['tags' => $tags]);
    }
}
