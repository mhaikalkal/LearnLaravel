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
