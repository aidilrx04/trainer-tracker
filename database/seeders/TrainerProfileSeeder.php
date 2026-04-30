<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\TrainerProfile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TrainerProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $trainers = User::where('role_id', Role::getTrainer()->id)->get();;

        foreach ($trainers as $trainer) {
            TrainerProfile::factory(1)->for($trainer)->create();
        }


        $user = User::factory(1)->create([
            'email' => 'trainer@mail.com',
            'role_id' => Role::getTrainer()->id
        ])->first();

        TrainerProfile::factory(1)->for($user)->create();
    }
}
