<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;

Route::get('/', function () {
    $posts= [];
    if (auth()->check()) {
        $posts=auth()->user()->usersCoolPosts()->latest()->get();
    }
    return view('home',[
        'posts' => $posts,
    ]);
});

Route::get('/blogs', [PostController::class, 'index']);

Route::get('/register', [UserController::class, 'showRegisterForm'])->middleware('guest');
Route::post('/register', [UserController::class, 'register'])->middleware('guest');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Blog post related
Route::post('/createPost',[PostController::class,'createPost'])->middleware('auth');
Route::get('/edit-post/{post}',[PostController::class,'showEditScreen'])->middleware('auth');
Route::put('/edit-post/{post}', [PostController::class, 'updatePost'])->middleware('auth');
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost'])->middleware('auth');
