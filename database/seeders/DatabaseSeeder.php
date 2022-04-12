<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Model
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // User::create([
        //     'name' => 'Muhammad Haikal',
        //     'email' => 'muhammadhaikal@gmail.com',
        //     'password' => bcrypt('123456')
        // ]);

        // User::create([
        //     'name' => 'Monica',
        //     'email' => 'monica@gmail.com',
        //     'password' => bcrypt('123456')
        // ]);

        User::factory(5)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Category::create([
            'name' => 'Art',
            'slug' => 'art'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem ex magnam doloremque mollitia quas beatae quos inventore esse, exercitationem cumque, porro molestiae consequuntur! Minima exercitationem hic eveniet a veniam, corrupti consequuntur omnis illo nulla eligendi nostrum, doloremque, quod quia dolores dolorem eaque amet doloribus ab?',
        //     'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem ex magnam doloremque mollitia quas beatae quos inventore esse, exercitationem cumque, porro molestiae consequuntur! Minima exercitationem hic eveniet a veniam, corrupti consequuntur omnis illo nulla eligendi nostrum, doloremque, quod quia dolores dolorem eaque amet doloribus ab?</p><p> Ipsam vel aut veritatis, beatae minus voluptate sed blanditiis repellat expedita obcaecati ut dolor necessitatibus in quisquam explicabo mollitia, sapiente soluta laudantium harum nemo nesciunt fugit quis aliquam.</p><p> Consequatur ducimus eius obcaecati fugiat est? Nobis ullam eveniet illum neque quisquam incidunt labore, nemo facere? Architecto non voluptate nulla adipisci consequatur sequi consectetur nisi id molestias?</p>',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem ex magnam doloremque mollitia quas beatae quos inventore esse, exercitationem cumque, porro molestiae consequuntur! Minima exercitationem hic eveniet a veniam, corrupti consequuntur omnis illo nulla eligendi nostrum, doloremque, quod quia dolores dolorem eaque amet doloribus ab?',
        //     'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem ex magnam doloremque mollitia quas beatae quos inventore esse, exercitationem cumque, porro molestiae consequuntur! Minima exercitationem hic eveniet a veniam, corrupti consequuntur omnis illo nulla eligendi nostrum, doloremque, quod quia dolores dolorem eaque amet doloribus ab?</p><p> Ipsam vel aut veritatis, beatae minus voluptate sed blanditiis repellat expedita obcaecati ut dolor necessitatibus in quisquam explicabo mollitia, sapiente soluta laudantium harum nemo nesciunt fugit quis aliquam.</p><p> Consequatur ducimus eius obcaecati fugiat est? Nobis ullam eveniet illum neque quisquam incidunt labore, nemo facere? Architecto non voluptate nulla adipisci consequatur sequi consectetur nisi id molestias?</p>',
        //     'category_id' => 2,
        //     'user_id' => 1,
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem ex magnam doloremque mollitia quas beatae quos inventore esse, exercitationem cumque, porro molestiae consequuntur! Minima exercitationem hic eveniet a veniam, corrupti consequuntur omnis illo nulla eligendi nostrum, doloremque, quod quia dolores dolorem eaque amet doloribus ab?',
        //     'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem ex magnam doloremque mollitia quas beatae quos inventore esse, exercitationem cumque, porro molestiae consequuntur! Minima exercitationem hic eveniet a veniam, corrupti consequuntur omnis illo nulla eligendi nostrum, doloremque, quod quia dolores dolorem eaque amet doloribus ab?</p><p> Ipsam vel aut veritatis, beatae minus voluptate sed blanditiis repellat expedita obcaecati ut dolor necessitatibus in quisquam explicabo mollitia, sapiente soluta laudantium harum nemo nesciunt fugit quis aliquam.</p><p> Consequatur ducimus eius obcaecati fugiat est? Nobis ullam eveniet illum neque quisquam incidunt labore, nemo facere? Architecto non voluptate nulla adipisci consequatur sequi consectetur nisi id molestias?</p>',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);

        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem ex magnam doloremque mollitia quas beatae quos inventore esse, exercitationem cumque, porro molestiae consequuntur! Minima exercitationem hic eveniet a veniam, corrupti consequuntur omnis illo nulla eligendi nostrum, doloremque, quod quia dolores dolorem eaque amet doloribus ab?',
        //     'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem ex magnam doloremque mollitia quas beatae quos inventore esse, exercitationem cumque, porro molestiae consequuntur! Minima exercitationem hic eveniet a veniam, corrupti consequuntur omnis illo nulla eligendi nostrum, doloremque, quod quia dolores dolorem eaque amet doloribus ab?</p><p> Ipsam vel aut veritatis, beatae minus voluptate sed blanditiis repellat expedita obcaecati ut dolor necessitatibus in quisquam explicabo mollitia, sapiente soluta laudantium harum nemo nesciunt fugit quis aliquam.</p><p> Consequatur ducimus eius obcaecati fugiat est? Nobis ullam eveniet illum neque quisquam incidunt labore, nemo facere? Architecto non voluptate nulla adipisci consequatur sequi consectetur nisi id molestias?</p>',
        //     'category_id' => 1,
        //     'user_id' => 2,
        // ]);
    }
}
