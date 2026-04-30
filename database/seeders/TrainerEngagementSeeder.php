<?php

namespace Database\Seeders;

use App\Models\TrainerEngagement;
use App\Models\TrainerProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainerEngagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainers = TrainerProfile::all();

        foreach ($trainers as $t) {
            TrainerEngagement::factory(3)->for($t)->create();
        }
    }
}
