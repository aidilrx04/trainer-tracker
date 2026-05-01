<?php

namespace Database\Seeders;

use App\Models\RecentTrainingProgram;
use App\Models\TrainerProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecentTrainingProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainers = TrainerProfile::all();

        foreach ($trainers as $t) {
            RecentTrainingProgram::factory(3)->for($t)->create();
        }
    }
}
