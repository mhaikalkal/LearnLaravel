<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2, 9)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            // map mirip di javascript, terus di join menggunakan implode '' (dihilangkan pemisahnya)
            'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(function($p) { return "<p>$p</p>"; })->implode(''),
            'user_id' => mt_rand(1, 4),
            'category_id' => mt_rand(1, 3),
        ];
    }
}
