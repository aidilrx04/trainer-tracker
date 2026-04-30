<?php

namespace Database\Factories;

use App\Models\TrainerEducation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TrainerEducation>
 */
class TrainerEducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'degree_name' => fake()->sentence(),
            'institution_name' => fake()->name(),
            'completion_year' => fake()->year(2026),
            'location' => fake()->country(),
            'grade' => fake()->numberBetween(1, 4),
        ];
    }
}
