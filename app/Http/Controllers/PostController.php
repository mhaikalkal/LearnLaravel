<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        return view('posts', [
            'title' => "Blog",
            'active' => "Blog", // buat class active di nav
            'label' => 'All Posts',
            'posts' => Post::latest()->get(), // udah include with(), di pindah di models
        ]);
    }

    // di binding, mirip di golang ke struct.
    public function show(Post $post) {
        return view('post', [
            'title' => "Single Post",
            'active' => "Blog", // buat class active di nav
            'post' => $post
        ]);
    }

}
