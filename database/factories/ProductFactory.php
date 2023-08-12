<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->text(),
            'image' => "https://www.bigw.com.au/medias/sys_master/images/images/h05/h67/35171080798238.jpg",
            'description' => fake()->realText(2000),
            'price' => fake()->randomFloat(2, 20, 5000),
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 1,

        ];
    }
}
