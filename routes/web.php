<?php

use App\Http\Controllers\CodeblogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Models\Codeblog;

use Illuminate\Support\Facades\Route;

Route::get('/',[CodeblogController::class,'index']);

Route::get('/blog/{blog:slug}',[CodeblogController::class,'show']);

Route::get('/register',[UserController::class,'create'])->middleware('guest');

Route::post('/register',[UserController::class,'store'])->middleware('guest');

Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

Route::get('/login',[UserController::class,'login'])->middleware('guest');

Route::post('/login',[UserController::class,'post_login'])->middleware('guest');

Route::post('/blog/{blog:slug}/comment',[CommentController::class,'store']);

Route::post('/blog/{blog:slug}/subscribe',[CodeblogController::class,'subscribe']);

Route::middleware('can:admin')->group(function(){
    Route::get('/blog/create/admin',[
        UserController::class,'admin'
        ]);
        
        Route::post('/blog/create/admin',[UserController::class,'blog_create']);
        
        Route::get('/blog/edit/admin',[CodeblogController::class,'edit']);
        
        Route::delete('/blog/{blog:slug}/delete',[CodeblogController::class,'destory']);
        
        Route::get('/blog/{blog:slug}/edit',[CodeblogController::class,'blog_edit']);
        
        Route::patch('/blog/{blog:slug}/edit/admin',[CodeblogController::class,'update']);
});