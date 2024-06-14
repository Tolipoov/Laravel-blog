<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;


class ShowController extends Controller
{
    public function index(Tag $tag){
        return view('admin.tag.show', ['tag' => $tag]);
    }
}
