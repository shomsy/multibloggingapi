<?php

namespace Database\Factories;

use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->sentence(5),
            'description' => $this->faker->paragraph(1),
            'website_id' => Website::inRandomOrder()->first()->id,
        ];
    }
}
