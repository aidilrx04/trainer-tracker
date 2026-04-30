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
        $user = new User();
        $user->role_id = Role::getTrainer()->id;
        $user->name = 'Test Trainer';
        $user->password = Hash::make('123123');
        $user->email = 'trainer@mail.com';

        $user->save();

        $user->refresh();

        TrainerProfile::factory(1)->for($user)->create();
    }
}
