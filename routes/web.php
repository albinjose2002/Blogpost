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

Route::get('/welcome',function(){
    return view('welcome');

});


Route::post('/register', [UserController::class,'register']);   
Route::post('/logout',[Usercontroller::class,'logout']);      
Route::post('/login',[UserController::class,'login']);

// Blog post related

Route::post('/createPost',[PostController::class,'createPost']);
Route::get('/edit-post/{post}',[PostController::class,'showEditScreen']);
