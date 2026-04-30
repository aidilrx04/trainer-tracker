<?php

namespace Database\Factories;

use App\Models\TrainerEngagement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TrainerEngagement>
 */
class TrainerEngagementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_name' => fake()->sentence(),
            'role' => fake()->jobTitle(),
            'topic' => fake()->text(),
            'year' => fake()->year(),
            'audience_size' => fake()->numberBetween(10, 1000),
        ];
    }
}
