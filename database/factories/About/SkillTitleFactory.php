<?php

namespace Database\Factories\About;

use App\Models\About\SkillTitle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SkillTitle>
 */
class SkillTitleFactory extends Factory
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
        ];
    }
}
