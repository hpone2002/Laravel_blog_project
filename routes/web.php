<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;


Route::get('/', [ArticleController::class, 'index']);

Route::get('/articles', [ArticleController::class, 'index']);
// Route::get('/articles', [ArticleController::class, 'index'])->middleware('auth');

Route::get('/articles/detail/{id}', [ArticleController::class, 'detail']);

Route::get('/articles/add', [ArticleController::class, 'add']);
// url (or) link ကနေ အလုပ်လုပ်

Route::post('/articles/add', [ArticleController::class, 'create']);
// html form ကနေ အလုပ်လုပ်

Route::get('/articles/delete/{id}', [ArticleController::class, 'delete']);

Route::post('/comments/add', [CommentController::class,'create']);

Route::get('/comments/delete/{id}', [CommentController::class, 'delete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

