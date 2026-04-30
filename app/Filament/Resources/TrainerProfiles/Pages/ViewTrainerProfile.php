<?php

namespace App\Filament\Resources\TrainerProfiles\Pages;

use App\Filament\Resources\TrainerProfiles\TrainerProfileResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTrainerProfile extends ViewRecord
{
    protected static string $resource = TrainerProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
