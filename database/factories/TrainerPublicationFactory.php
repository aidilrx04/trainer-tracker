<?php

namespace Database\Factories;

use App\Models\TrainerPublication;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TrainerPublication>
 */
class TrainerPublicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'publication_name' => fake()->company(),
            'published_at' => fake()->date(),
            'link' => fake()->url()
        ];
    }
}
