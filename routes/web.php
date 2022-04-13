<?php

// Models

use App\Http\Controllers\CategoryController;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
    return view('home', [
        "title" => "Home",
        'active' => 'Home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        'active' => 'About',
        "name" => "Muhammad Haikal",
        "email" => "muhammadhaikal.420z@gmail.com",
        "image" => "haikal.jpg"
    ]);
});

Route::get('/posts', [PostController::class, 'index']); // pake class PostController (controller) yang nama function-nya index

// {post:slug} || karena kita nge-bind dengan model. maka post merupakan post model.
// {post:slug} || karena kita mau ambil property slug, maka pake `:`
// {post:slug} || jadi mirip kaya Post->Where('slug', 'isi slug nya').
Route::get('/post/{post:slug}', [PostController::class, 'show']);

// category
Route::get('/category/{category:slug}', [CategoryController::class, 'PostsFromCategory']);
Route::get('/categories', [CategoryController::class, 'categories']);

// author
Route::get('/author/{author:username}', [UserController::class, 'PostsFromAuthor']);
