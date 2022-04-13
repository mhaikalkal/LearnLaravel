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

    // jadi ->filter, pas diambil di controller-nya.
    public function scopeFilter($query, array $filters) {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //                  ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }
        // atau pake yg dibawah, sama aja

        // contoh when
        // $collection = collect([1, 2, 3]);
        // $collection->when(true, function ($collection) {
        //     return $collection->push(4);
        // });
        // $collection->when(false, function ($collection) {
        //     return $collection->push(5);
        // });
        // hasil = 1,2,3,4

        // disini dia masukin ulang si query-nya dan filters['search] == function($query, $search)
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                      ->orWhere('body', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['category'] ?? false, function($query, $category) { // dianggap bukan yg ini,
            // pakai use, karena kalau dimasukin di function($query, $category), dia bukan category diatas
            return $query->whereHas('category', function($query) use ($category) { // makannya kita pake use biar didefinisikan bahwa kita mau pake category yang sama
                // whereHas ini artinya = dimana table yang kita cari punya relationship dengan category(ini tuh function yang belongsTo)
                $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, function($query, $author) {
            return $query->whereHas('author', function($query) use ($author) {
                $query->where('username', $author);
            });
        });
    }

}
