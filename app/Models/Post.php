<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // property yang bisa diisi. Sisanya tidak boleh diisi.
    // protected $fillable = ['title', 'slug', 'excerpt', 'body'];

    // property yang tidak boleh diisi, dijaga. Sisanya boleh diisi.
    protected $guarded = ['id'];

    // lazy loading ==> merupakan load data ketika disuruh, kelemahannya
    // ketika looping, kita mengulang2 query, yang membuat performance menurun.
    // yang harusnya query 1x kalo data ada 100, jadi eksekusi 101x

    // ::with() ==> merupakan eager loading kebalikan dari lazy loading, yang artinya
    // jadi kita load data diawal. baru di looping.
    // query 1x kalo ada data 100, eksekusi tetep 1x
    protected $with = ['author', 'category'];
    // author, category ini, merupakan relasi yang mau diambil ke page-nya.
    // karena si posts ini mau ngambil siapa author dan apa category name-nya maka ya 2 itu yang diambil.

    public function category()
    {
        return $this->belongsTo(Category::class);

    }

    public function author()
    {
        // alias, user_id alias author. jadi kalo kita manggil author == user_id
        return $this->belongsTo(User::class, 'user_id');

    }

}
