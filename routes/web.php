<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $posts=[];
    if(auth()->check()){
        $posts=auth()->user()->userCoolPosts()->latest()->get();
    }
    return view('home',['posts'=>$posts]);
});


Route::post('/register', [UserController::class,'register']);
Route::post('/logout', [UserController::class,'logout']);
Route::post('/login', [UserController::class,'login']);


//post controler

Route::post('/create-post',[PostController::class,'createPost']);
Route::get('/edit-post/{post}',[PostController::class,'showEditScreen']);
Route::put('/edit-post/{post}',[PostController::class,'actuallyUpdatedPost']);
Route::delete('/delete-post/{post}',[PostController::class,'deletePost']);

 