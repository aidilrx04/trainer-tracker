<?php

namespace App\Filament\Dashboard\Resources\TrainerEducation\Pages;

use App\Filament\Dashboard\Resources\TrainerEducation\TrainerEducationResource;
use Filament\Facades\Filament;
use Filament\Resources\Pages\CreateRecord;
use Override;

class CreateTrainerEducation extends CreateRecord
{
    protected static string $resource = TrainerEducationResource::class;

    protected function
    mutateFormDataBeforeCreate(array $data): array
    {
        $data['trainer_profile_id'] = Filament::auth()->user()->trainer->id;

        return parent::mutateFormDataBeforeCreate($data);
    }
}
