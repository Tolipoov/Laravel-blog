<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function index(User $user){
        $roles = User::getRoles();
        return view('admin.user.edit', ['user' => $user, 'roles'=> $roles]);
    }
}
