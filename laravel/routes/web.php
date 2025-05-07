<?php

use App\Http\Controllers\Coments\CommentController;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\Users\UserController;
use App\Http\Middleware\CheckRoleAccess;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('/users', UserController::class);

Route::resource('/posts', PostController::class);

//Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::middleware(['auth'])->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
});

Route::middleware(['auth', CheckRoleAccess::class.':admin,editor'])->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
});

Route::middleware(['auth'])->group(function(){
    Route::resource('users', UserController::class)
        ->middleware(CheckRoleAccess::class . ':admin');
});