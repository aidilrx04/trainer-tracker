<?php

namespace Database\Factories;

use App\Models\TrainerCertification;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TrainerCertification>
 */
class TrainerCertificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'certification_name' => fake()->text(),
            'issuing_body' => fake()->company(),
            'year_obtained' => fake()->year(),
            'expires_at' => fake()->date(max: '+10 years')
        ];
    }
}
