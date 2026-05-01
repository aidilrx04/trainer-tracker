<?php

namespace Database\Factories;

use App\Models\TrainerLanguage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TrainerLanguage>
 */
class TrainerLanguageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'language' => fake()->word(),
            'proficiency' => fake()->randomElement(['Native', 'Fluent', 'Professional Working Proficiency', 'Conversational', 'Basic']),
        ];
    }
}
