<?php

namespace App\Filament\Dashboard\Resources\TrainerEducation\Pages;

use App\Filament\Dashboard\Resources\TrainerEducation\TrainerEducationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTrainerEducation extends EditRecord
{
    protected static string $resource = TrainerEducationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
