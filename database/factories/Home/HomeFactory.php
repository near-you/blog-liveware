<?php

namespace Database\Factories\Home;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Home\Home>
 */
class HomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'short_description' => fake()->lexify('Hello ???'),
            'image' => fake()->imageUrl($width = 640, $height = 480),
            'facebook_link' => fake()->url,
            'twitter_link' => fake()->url,
            'behance_link' => fake()->url,
            'linkedin_link' => fake()->url,
            'instagram_link' => fake()->url,
        ];
    }
}
