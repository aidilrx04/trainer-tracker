<?php

namespace Database\Seeders;

use App\Models\TrainerEducation;
use App\Models\TrainerProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainerEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainers = TrainerProfile::all();

        foreach ($trainers as $t) {
            TrainerEducation::factory(3)->for($t)->create();
        }
    }
}
