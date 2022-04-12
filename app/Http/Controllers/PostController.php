<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        return view('posts', [
            'title' => "Blog",
            'label' => 'All Posts',
            // lazy loading ==> merupakan load data ketika disuruh, kelemahannya
            // ketika looping, kita mengulang2 query, yang membuat performance menurun.
            // yang harusnya query 1x kalo data ada 100, jadi eksekusi 101x

            // ::with() ==> merupakan eager loading kebalikan dari lazy loading, yang artinya
            // jadi kita load data diawal. baru di looping.
            // query 1x kalo ada data 100, eksekusi tetep 1x
            "posts" => Post::with(['author', 'category'])->latest()->get(),
            // author, category ini, merupakan relasi yang mau diambil ke page-nya.
            // karena si posts ini mau ngambil siapa author dan apa category name-nya maka ya 2 itu yang diambil.
        ]);
    }

    // di binding, mirip di golang ke struct.
    public function show(Post $post) {
        return view('post', [
            "title" => "Single Post",
            "post" => $post
        ]);
    }

}
