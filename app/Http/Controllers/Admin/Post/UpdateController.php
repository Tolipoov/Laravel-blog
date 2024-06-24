<?php

namespace App\Http\Controllers\Admin\Post;


use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;


class UpdateController extends BaseController
{
    public function index(UpdateRequest $request,  Post $post){

        $data = $request->validated();
        $post = $this->service->update($data, $post);
       

        return redirect()->route('admin.post.update', ['post' => $post]);
    }

    
}
