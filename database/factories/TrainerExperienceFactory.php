<?php

namespace Database\Factories;

use App\Models\TrainerExperience;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TrainerExperience>
 */
class TrainerExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => fake()->company(),
            'job_title' => fake()->jobTitle(),
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'is_current' => fake()->boolean(),
            'responsibilities' => fake()->paragraphs(3, true),
            'achievements' => fake()->paragraphs(3, true)
        ];
    }
}
