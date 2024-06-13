<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Main\MainController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', [IndexController::class, 'index'])->name('main.index');
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', [MainController::class, 'index'])->name('main.main');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.category');
    });

   

});

Auth::routes();
