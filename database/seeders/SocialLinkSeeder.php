<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use App\Models\TrainerProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $platforms = [
            'Youtube',
            'Instagram',
            'Thread',
            fake()->word(),
            fake()->word(),
            fake()->word()
        ];

        $trainers = TrainerProfile::all();

        foreach($trainers as $trainer){
            foreach($platforms as $p){
                SocialLink::factory(1)->for($trainer)->create([
                    'platform'=>$p
                ]);
            }
        }
    }
}
