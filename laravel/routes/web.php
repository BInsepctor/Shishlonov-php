<?php

use App\Http\Controllers\Coments\CommentController;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\Users\UserController;
use App\Http\Middleware\CheckRoleAccess;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Services\Posts\PostService;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/posts', PostController::class)->only(['index', 'show'])->where(['post' => '[0-9]+']); 
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::middleware(CheckRoleAccess::class . ':admin')->group(function () {
        Route::resource('users', UserController::class);
    });

    Route::middleware([CheckRoleAccess::class . ':admin,editor'])->group(function () {
        Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    });
});
Route::get('/test', function () {
    app(PostService::class)->create(['title' => 'test', 'content' => 'test']);
});
