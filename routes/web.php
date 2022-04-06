<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [BlogPostController::class, 'index'])->name('blog.index');

Auth::routes();

Route::resource('blog.comments', CommentController::class)->middleware('auth')->only('create', 'store', 'destroy');
Route::resource('blog', BlogPostController::class);
Route::resource('user', UserController::class)->only('show');
