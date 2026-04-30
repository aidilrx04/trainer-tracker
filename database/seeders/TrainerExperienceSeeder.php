<?php

namespace Database\Seeders;

use App\Models\TrainerExperience;
use App\Models\TrainerProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainerExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainers = TrainerProfile::all();

        foreach ($trainers as $t) {
            TrainerExperience::factory(3)->for($t)->create();
        }
    }
}
