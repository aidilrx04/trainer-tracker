<?php

namespace Database\Factories;

use App\Models\RecentTrainingProgram;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<RecentTrainingProgram>
 */
class RecentTrainingProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'program_name' => fake()->jobTitle(),
            'client' => fake()->company(),
            'date_string' => fake()->date(),
            'participant_count' => fake()->numberBetween(100, 1000),
            'duration' => fake()->numberBetween(1, 5) . ' days'
        ];
    }
}
