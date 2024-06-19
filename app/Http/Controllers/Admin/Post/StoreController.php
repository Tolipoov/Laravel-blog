<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function index(StoreRequest $request){

        $data = $request->validated();
        $data['main_image'] = Storage::put('/images', $data['main_image']);
        $data['single_image'] = Storage::put('/images', $data['single_image']);

        Post::firstOrCreate($data);

        return redirect()->route('admin.post.index');
    }
}
