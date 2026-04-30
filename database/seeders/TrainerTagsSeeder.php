<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\TrainerProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainerTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainers = TrainerProfile::all();

        foreach ($trainers as $t) {
            $tags = Tag::inRandomOrder()->limit(10)->pluck('id');
            $t->tags()->attach($tags);
        }
    }
}
