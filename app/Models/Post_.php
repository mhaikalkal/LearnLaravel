<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post
{
    private static $blog_posts = [
        [
            "title" => "How to Kill Your Enemies",
            "slug" => "how-to-kill-your-enemies",
            "author" => "Muhammad Haikal",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae numquam iste dolor tenetur natus ea totam! Quaerat eius ipsam omnis hic nesciunt eveniet error amet provident soluta deleniti, corrupti et. Illum, vel perspiciatis tempora necessitatibus eaque debitis a earum, aliquid fugiat, laboriosam dolore sequi quo inventore corporis harum. Error, ut! Est sed ipsum voluptatibus unde dolores harum debitis. Impedit officia dolor magnam, voluptatibus, corporis dolores cum, distinctio accusamus expedita dolore alias? Nostrum dolorum est architecto?",
        ],
        [
            "title" => "Golang from scratch",
            "slug" => "golang-from-scratch",
            "author" => "Muhammad Haikal",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae numquam iste dolor tenetur natus ea totam! Quaerat eius ipsam omnis hic nesciunt eveniet error amet provident soluta deleniti, corrupti et. Illum, vel perspiciatis tempora necessitatibus eaque debitis a earum, aliquid fugiat, laboriosam dolore sequi quo inventore corporis harum. Error, ut! Est sed ipsum voluptatibus unde dolores harum debitis.",
        ]
    ];

    public static function all() {
        // karena sebuah property  var 'static' maka memakai self::namaVar
        // kalau property biasa bisa pake $this->namaVar
        // this/self ini karena 1 file

        return collect(self::$blog_posts);
    }

    public static function find($slug) {
        // $posts = self::$blog_posts;

        // $post = [];
        // foreach($posts as $p) {
        //     if($p["slug"] === $slug) {
        //         $post = $p;
        //     }
        // }

        // return $post;

        // atau bisa pake collection dari function static all()
        // static:: ini untuk method static
        // intinya yang pake :: ini meruakan sebuah property static
        $post = static::all();

        return $post->firstWhere('slug', $slug);
    }
}
