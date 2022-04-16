<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource. ini mah view create nya
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage. nah ini untuk ngeproses si inputnya ke db
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ambil file image dan masukin ke folder storage/app/public. tapi gabisa di akses sama orang lain.
        // jadi harus di link dulu ke folder app/public. caranya.
        // php artisan storage:link
        // jadi kaya bikin shortcut gitu.
        // $request->file('image')->store('thumbnail-image');

        $validateData = $request->validate([
            'title' => ['required', 'max:255'],
            'slug' => ['required', 'unique:posts'],
            'image' => ['image', 'file', 'max:1024'],
            'category_id' => ['required'],
            'body'=> ['required'],
        ]);

        $validateData['user_id'] = auth()->user()->id;
        // biar semua tag di body diilangin. karena excerpt kanambil dari body.
        $validateData['excerpt'] = Str::limit(strip_tags($validateData['body']), 200);

        // kalo ada isinya. bakal true. kalo ga diisi false
        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('thumbnail-image');
        }

        Post::create($validateData);

        // return $validateData; // buat nge check doang
        return redirect('/dashboard/posts')->with('success', 'New Post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    // Request ini data yang baru, Post ini merupakan data lama yg ada di db.
    public function update(Request $request, Post $post)
    {
        // kalau kita gak ubah isi slugnya, akan bentrok dan gak akan lolos di validasi.
        // maka caranya kita masukin si slug ke dalam if
        $rules = [
            'title' => ['required', 'max:255'],
            'category_id' => ['required'],
            'image' => ['image', 'file', 'max:1024'],
            'body'=> ['required'],
        ];

        // jika slug baru != slug lama, maka validasi
        // kalau sama, udah gausah validasi, da udah dikenal.
        if ($request->slug != $post->slug) {
           $rules['slug'] = ['required', 'unique:posts'];
        }

        // baru di validasi kesini.
        $validateData = $request->validate($rules);

        // baru data dikelola buat diubah
        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($validateData['body']), 200);

        // kalo ada gambar baru
        if ($request->file('image')) {
            // ambil inputan dari hidden oldImage, lalu kita hapus gambar lamanya
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['image'] = $request->file('image')->store('thumbnail-image');
        }

        // update deh
        Post::where('id', $post->id)->update($validateData);

        // balik lagi ke dashboard
        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    // meskipun yg diambil di form deletenya post->slug, kan yg diambil 1 Post dati slug tsb, nah nanti yg masuk kesini post yg slug nya itu.
    public function destroy(Post $post)
    {
        if ($post->image) {
            // kalau postingan ini punya gambar, maka delete
            Storage::delete($post->image);
        }

        // baru nanti si psot->id nya diambil sama ini.
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }

    public function checkSlug(Request $request) {
        // model, attribute
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        // return sebagai json yang isinya 'slug' diisi var slug diatas.
        // kenapa isinya 'slug' ? karena di script nya kita ambil jadi data.slug
        return response()->json(['slug' => $slug]);
    }
}
