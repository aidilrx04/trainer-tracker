<?php

namespace App\Filament\Resources\TrainerProfiles\Pages;

use App\Filament\Resources\TrainerProfiles\TrainerProfileResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTrainerProfiles extends ListRecords
{
    protected static string $resource = TrainerProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
