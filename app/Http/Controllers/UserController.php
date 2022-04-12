<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function PostsFromAuthor(User $author){
        return view('posts', [
            'title' => 'Author Posts',
            'label' => "Post(s) By Author : $author->name",
            'name' => $author->name,
            'username' => $author->username,
            // load ini merupakan 'Eager Lazy Loading' jadi kita load parent-nya baru lakukan sisanya
            'posts' => $author->posts->load('category', 'author'), // bahasa manusia : kita ambil Postingan, setelah selesai, baru kita ambil category sama authornya
            // lhoo kenapa posts jadi parent?
            // Karena kita emang mau ambil semua post dari user/author yg bernama ...
            // dan kita mau menampilkan author dan category post nya apa.

        ]);
    }


}
