<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;


class MainController extends Controller
{
    public function index(){
        return view('personal.main.index');
    }
}
