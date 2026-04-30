<?php

namespace App\Filament\Dashboard\Resources\TrainerLanguages\Pages;

use App\Filament\Dashboard\Resources\TrainerLanguages\TrainerLanguageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTrainerLanguage extends EditRecord
{
    protected static string $resource = TrainerLanguageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
