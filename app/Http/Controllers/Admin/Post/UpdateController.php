<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;


class UpdateController extends Controller
{
    public function index(UpdateRequest $request,  Post $post){

        $data = $request->validated();
        $post ->update($data);

        return redirect()->route('admin.post.update', ['post' => $post]);
    }
}
