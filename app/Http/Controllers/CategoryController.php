<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function categories() {
        return view('categories', [
            'title' => 'Post Categories',
            'categories' => Category::all(),
        ]);
    }

    public function PostsFromCategory(Category $category) {
        return view('category', [
            'title' => $category->name, // passing ke <title> nama tab-nya
            'posts' => $category->posts, // ini kalo mau ambil banyak post dari sebuah category. karena post belongsTo category. Si posts ini merupakan public function posts() di model category
            'category' => $category->name, // dipass sebagai label header.
        ]);
    }


}
