<?php

namespace App\Filament\Dashboard\Resources\TrainerLanguages\Pages;

use App\Filament\Dashboard\Resources\TrainerLanguages\TrainerLanguageResource;
use Filament\Resources\Pages\CreateRecord;
use Override;

class CreateTrainerLanguage extends CreateRecord
{
    protected static string $resource = TrainerLanguageResource::class;

    protected function
    mutateFormDataBeforeCreate(array $data): array
    {
        $data['trainer_profile_id'] = filament()->auth()->user()->trainer->id;
        return parent::mutateFormDataBeforeCreate($data);
    }
}
