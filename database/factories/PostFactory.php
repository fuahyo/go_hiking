<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                //mt_rand= untuk membangkitkan bilangan randon, (2,8)= min 2 kata maks 8 kata
                'title' => $this->faker->sentence(mt_rand(2,8)),
                'slug' => $this->faker->slug(),
                'excerpt' => $this->faker->paragraph(),
                // 'body' => '<p>'.implode('</p><p>',$this->faker->paragraphs(mt_rand(3,7))).'</p>',
                //pakai implode atau collect sama aja
                'body' => collect($this->faker->paragraphs(mt_rand(3,7)))
                            ->map(fn($p)=>"<p>$p</p>")
                            ->implode(''),
                'category_id' => mt_rand(1,3),
                'user_id' => mt_rand(1,4),
        ];
    }
}
