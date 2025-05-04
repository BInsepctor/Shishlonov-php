<?php

use App\Http\Controllers\Coments\CommentController;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('/users', UserController::class);

Route::resource('/posts', PostController::class);

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
