<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;

Route::resource('posts', PostController::class);

Route::post('post/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('posts/{post}/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

//Route::get('/profiles/{user}', [ProfileController::class, 'show'])->name('profiles.show');
//Route::get('/profiles/{user}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
//Route::get('/profiles/{user}', [ProfileController::class, 'update'])->name('profiles.update');

Route::get('/profiles/{user}', [ProfileController::class, 'show'])->name('profiles.show');
Route::get('/profiles/{user}/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
Route::put('/profiles/{user}', [ProfileController::class, 'update'])->name('profiles.update');

Route::resource('tags', TagController::class);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
