<?php

namespace Database\Seeders;

use App\Models\TrainerProfile;
use App\Models\TrainerPublication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainerPublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainers = TrainerProfile::all();

        foreach ($trainers as $t) {
            TrainerPublication::factory(3)->for($t)->create();
        }
    }
}
