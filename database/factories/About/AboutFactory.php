<?php

namespace Database\Factories\About;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About\About>
 */
class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'profession' => fake()->jobTitle,
            'image' => fake()->imageUrl($width = 640, $height = 480),
            'description' => fake()->text($maxNbChars = 200),
            'date_of_birth' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'address' => fake()->address,
            'email' => fake()->safeEmail,
            'phone' => fake()->e164PhoneNumber,
            'nationality' => 'My Nationality',
            'study' => 'My Study',
            'degree' => 'My Degree',
            'interest' => 'My Interests',
            'freelance' => 'Freelance',
        ];
    }
}
