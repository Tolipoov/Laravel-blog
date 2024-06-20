<?php

use App\Http\Controllers\Admin\Category\CreateController;
use App\Http\Controllers\Admin\Category\DeleteController;
use App\Http\Controllers\Admin\Category\EditController;
use App\Http\Controllers\Admin\Category\IndexController as CategoryIndexController;
use App\Http\Controllers\Admin\Category\ShowController;
use App\Http\Controllers\Admin\Category\StoreController;
use App\Http\Controllers\Admin\Category\UpdateController;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\Main\MainController;
use App\Http\Controllers\Admin\Post\CreateController as PostCreateController;
use App\Http\Controllers\Admin\Post\DeleteController as PostDeleteController;
use App\Http\Controllers\Admin\Post\EditController as PostEditController;
use App\Http\Controllers\Admin\Post\IndexController as PostIndexController;
use App\Http\Controllers\Admin\Post\ShowController as PostShowController;
use App\Http\Controllers\Admin\Post\StoreController as PostStoreController;
use App\Http\Controllers\Admin\Post\UpdateController as PostUpdateController;
use App\Http\Controllers\Admin\Tag\CreateController as TagCreateController;
use App\Http\Controllers\Admin\Tag\DeleteController as TagDeleteController;
use App\Http\Controllers\Admin\Tag\EditController as TagEditController;
use App\Http\Controllers\Admin\Tag\IndexController as TagIndexController;
use App\Http\Controllers\Admin\Tag\ShowController as TagShowController;
use App\Http\Controllers\Admin\Tag\StoreController as TagStoreController;
use App\Http\Controllers\Admin\Tag\UpdateController as TagUpdateController;
use App\Http\Controllers\Admin\User\CreateController as UserCreateController;
use App\Http\Controllers\Admin\User\DeleteController as UserDeleteController;
use App\Http\Controllers\Admin\User\EditController as UserEditController;
use App\Http\Controllers\Admin\User\IndexController as UserIndexController;
use App\Http\Controllers\Admin\User\ShowController as UserShowController;
use App\Http\Controllers\Admin\User\StoreController as UserStoreController;
use App\Http\Controllers\Admin\User\UpdateController as UserUpdateController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Requests\Admin\Tag\StoreRequest;
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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin'] ], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', [MainController::class, 'index'])->name('main.main');
    });

    // Post Route 
    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', [PostIndexController::class, 'index'])->name('admin.post.index');
        Route::get('/create', [PostCreateController::class, 'index'])->name('admin.post.create');
        Route::post('/', [PostStoreController::class, 'index'])->name('admin.post.store');
        Route::get('/{post}', [PostShowController::class, 'index'])->name('admin.post.show');
        Route::get('/{post}/edit', [PostEditController::class, 'index'])->name('admin.post.edit');
        Route::patch('/{post}', [PostUpdateController::class, 'index'])->name('admin.post.update');
        Route::delete('/{post}', [PostDeleteController::class, 'index'])->name('admin.post.delete');
    });

    // Category Route 
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', [CategoryIndexController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [CreateController::class, 'index'])->name('admin.category.create');
        Route::post('/', [StoreController::class, 'index'])->name('admin.category.store');
        Route::get('/{category}', [ShowController::class, 'index'])->name('admin.category.show');
        Route::get('/{category}/edit', [EditController::class, 'index'])->name('admin.category.edit');
        Route::patch('/{category}', [UpdateController::class, 'index'])->name('admin.category.update');
        Route::delete('/{category}', [DeleteController::class, 'index'])->name('admin.category.delete');
    });

    // Tag Route
    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', [TagIndexController::class, 'index'])->name('admin.tag.index');
        Route::get('/create', [TagCreateController::class, 'index'])->name('admin.tag.create');
        Route::post('/', [TagStoreController::class, 'index'])->name('admin.tag.store');
        Route::get('/{tag}', [TagShowController::class, 'index'])->name('admin.tag.show');
        Route::get('/{tag}/edit', [TagEditController::class, 'index'])->name('admin.tag.edit');
        Route::patch('/{tag}', [TagUpdateController::class, 'index'])->name('admin.tag.update');
        Route::delete('/{tag}', [TagDeleteController::class, 'index'])->name('admin.tag.delete');
    });

    // User Route 
    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
    Route::get('/', [UserIndexController::class, 'index'])->name('admin.user.index');
    Route::get('/create', [UserCreateController::class, 'index'])->name('admin.user.create');
    Route::post('/', [UserStoreController::class, 'index'])->name('admin.user.store');
    Route::get('/{user}', [UserShowController::class, 'index'])->name('admin.user.show');
    Route::get('/{user}/edit', [UserEditController::class, 'index'])->name('admin.user.edit');
    Route::patch('/{user}', [UserUpdateController::class, 'index'])->name('admin.user.update');
    Route::delete('/{user}', [UserDeleteController::class, 'index'])->name('admin.user.delete');
    });
   

});

Auth::routes();
