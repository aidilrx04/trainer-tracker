<?php

namespace App\Filament\Dashboard\Resources\TrainerEducation\Pages;

use App\Filament\Dashboard\Resources\TrainerEducation\TrainerEducationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTrainerEducation extends ListRecords
{
    protected static string $resource = TrainerEducationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
