<?php

namespace App\Filament\Dashboard\Resources\TrainerLanguages\Pages;

use App\Filament\Dashboard\Resources\TrainerLanguages\TrainerLanguageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTrainerLanguages extends ListRecords
{
    protected static string $resource = TrainerLanguageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
