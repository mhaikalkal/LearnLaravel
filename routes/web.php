<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController;

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
// Route::get('/category/{category:slug}', [CategoryController::class, 'PostsFromCategory']);
Route::get('/categories', [CategoryController::class, 'categories']);

// author
// Route::get('/author/{author:username}', [UserController::class, 'PostsFromAuthor']);

// name('login') disini kita kasih si route get /login alias 'login'.
Route::get('/login', [AuthController::class,'login'])->name('login')->middleware('guest'); // login hanya bisa diakses sebagai guest/ belum login
Route::post('/login', [AuthController::class,'authenticate']); // untuk login
Route::post('/logout', [AuthController::class,'logout']); // untuk logout

Route::get('/register', [AuthController::class,'register'])->middleware('guest'); // login hanya bisa diakses sebagai guest/ belum login
Route::post('/register', [AuthController::class,'store']); // untuk register

// karena cuma buat landing ke dashboard jadi kita bikin closure aja biar ga ribet
Route::get('/dashboard', function(){
    return view('dashboard.index', [
        'username' => auth()->user()->username,
        'name' => auth()->user()->name,
    ]);
})->middleware('auth'); // hanya untuk yang sudah login

// Dashboard Post, dia type resource karena kita buat crud
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// gatau kenapa harus /post/ bukan /posts/ kaya di tutorial, aneh
Route::get('/dashboard/post/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

// resource kan bikin routes otomatis nih,
// nah karena ada method show, dan karena kita ga akan pake rout nya,
// maka bisa kita hilangkan/kecualikan dengan cara ->except('show);
// php artisan route:list
// hasilnya si show ilang.

// Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show'); // di controller ini kita pake gate, jadi gausah middleware.
// kita kolaborasi antara gate dan middleware. middleware cuma bisa dipakai di routes. sedangkan gate dimanapun.
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

// Route::get('/dashboard/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('admin');

