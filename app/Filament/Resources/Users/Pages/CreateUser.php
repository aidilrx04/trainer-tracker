<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Models\Role;
use App\Models\TrainerProfile;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function afterCreate()
    {
        $trainerRole = Role::getTrainer();
        if ($this->record->role->id == $trainerRole->id) {
            $trainer = new TrainerProfile();
            $trainer->user_id = $this->record->id;
            $trainer->save();
        }
    }
}
