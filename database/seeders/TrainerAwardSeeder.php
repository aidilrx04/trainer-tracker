<?php

namespace Database\Seeders;

use App\Models\TrainerAward;
use App\Models\TrainerProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainerAwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainers = TrainerProfile::all();

        foreach ($trainers as $t) {
            TrainerAward::factory(3)->for($t)->create();
        }
    }
}
