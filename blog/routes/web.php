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
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create/', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show');
Route::get('/posts/edit/{post}',[PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/edit/{post}',[PostController::class, 'update'])->name('posts.update');
Route::delete('posts/{post}', [PostController::class, 'delete'])->name('posts.delete');
//Comment Routes
Route::post('posts/comments/{post}',[CommentsController::class, 'store'])->name('comments.store');
