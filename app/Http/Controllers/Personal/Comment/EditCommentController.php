<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class EditCommentController extends Controller
{
    public function index(Comment $comment){

        return view('personal.comment.edit', ['comment' => $comment]);
    }
}
