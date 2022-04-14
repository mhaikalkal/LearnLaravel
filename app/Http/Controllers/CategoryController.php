<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function categories() {
        return view('categories', [
            'title' => 'Post Categories',
            'active' => "Categories", // buat class active di nav
            'label' => 'All Categories',
            'categories' => Category::all(),
        ]);
    }

    // Karena return ke posts maka ini gak dipake juga bisa
    // public function PostsFromCategory(Category $category) {
    //     return view('posts', [
    //         'title' => $category->name, // passing ke <title> karena kita mengisinya menggunakan {{ $title }}
    //         'active' => "Blog",
    //         'label' => "Post(s) By Category : $category->name", // buat label di body
    //         'posts' => $category->posts->load('category', 'author'), // ini kalo mau ambil banyak post dari sebuah category. karena post belongsTo category. Si posts ini merupakan public function posts() di model category
    //     ]);
    // }


}
