<?php

namespace Database\Seeders;

use App\Models\TrainerLanguage;
use App\Models\TrainerProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainerLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainers = TrainerProfile::all();

        foreach ($trainers as $t) {
            TrainerLanguage::factory(3)->for($t)->create();
        }
    }
}
