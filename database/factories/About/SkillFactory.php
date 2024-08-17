<?php

namespace Database\Factories\About;

use App\Models\About\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Skill>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'percent' => $this->faker->numberBetween($min = 1, $max = 100),
        ];
    }
}
