<?php

namespace Database\Factories;

use App\Models\TrainerAward;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TrainerAward>
 */
class TrainerAwardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'award_name' => fake()->text(),
            'issuing_organization' => fake()->company(),
            'year' => fake()->year()
        ];
    }
}
