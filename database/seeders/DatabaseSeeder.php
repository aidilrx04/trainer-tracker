<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            TrainerProfileSeeder::class,
            SocialLinkSeeder::class,
            TrainerEducationSeeder::class,
            TrainerAwardSeeder::class,
            TrainerCertificationSeeder::class,
            TrainerExperienceSeeder::class,
            TrainerEngagementSeeder::class,
            TrainerLanguageSeeder::class,
            TrainerPublicationSeeder::class,
            TagSeeder::class,
            TrainerTagsSeeder::class,
            RecentTrainingProgramSeeder::class,
        ]);
    }
}
