<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;


class PostController extends Controller
{
    public function index() {
        $label = '';

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $label = ' in ' . $category->name;
        } else if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $label = ' by ' . $author->name;
        }

        return view('posts', [
            'title' => "Blog",
            'active' => "Blog", // buat class active di nav
            'label' => 'All Posts' . $label,
            // filter, merupakan method dari model post yaitu scopeFilter. merupakan query scope local.
            // yang isinya = kalau ada url query, nanti dia masuk add ->where() ke db builder-nya
            // baru deh di return view nya dieksekusi db-nya pake get()
            // 'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->get(), udah include with(), di pindah di models
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(), // paginasi
            // kita masukin param ke filter, nanti si model nagkep filternya pake isset.
            // kalau request dari input search ada valur-nya maka filter dijalanin,
            // kalau enggak, ya diskip, langsung get.
            // tapi kenapa pake [] array? biar nanti bisa pencarian generic, gak cuma buat 1 table aja.
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
