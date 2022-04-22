<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Post Routes
Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
Route::get('/posts/create/', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show')->middleware('auth');
Route::get('/posts/edit/{post}',[PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::put('/posts/edit/{post}',[PostController::class, 'update'])->name('posts.update')->middleware('auth');
Route::delete('posts/{post}', [PostController::class, 'delete'])->name('posts.delete')->middleware('auth');
//Comment Routes
Route::post('posts/comments/{post}',[CommentsController::class, 'store'])->name('comments.store')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
