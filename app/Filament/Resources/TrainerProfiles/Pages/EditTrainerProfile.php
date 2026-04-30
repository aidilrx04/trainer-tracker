<?php

namespace App\Filament\Resources\TrainerProfiles\Pages;

use App\Filament\Resources\TrainerProfiles\TrainerProfileResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTrainerProfile extends EditRecord
{
    protected static string $resource = TrainerProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
