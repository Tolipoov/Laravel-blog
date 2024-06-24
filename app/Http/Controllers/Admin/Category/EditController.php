<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class EditController extends Controller
{
    public function index(Category $category){
        return view('admin.category.edit', ['category' => $category]);
    }
}
