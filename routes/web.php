<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
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



Route::get('/',[HomeController::class,'index'])->name('home');

Route::group(['prefix'=>'articles','as'=>'articles.'], function(){
    Route::get('/',[ArticleController::class,'articles'])->name('index');
    Route::get('/{slug}',[ArticleController::class,'show'])->name('show');
    Route::get('/favourite/{article_id}',[ArticleController::class,'favourite'])->name('addFavourite');
});

Route::post('create',[CommentController::class,'create'])->name('comment.create');

Route::get('tag/{slug}',[TagController::class,'index'])->name('tag.index');



Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('authenticate',[AuthController::class,'authenticate'])->name('authenticate');
Route::get('register',[AuthController::class,'register'])->name('register');
Route::post('logout',[AuthController::class,'logout'])->name('logout');
Route::post('register',[AuthController::class,'register_store'])->name('register.store');








