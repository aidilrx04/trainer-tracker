<?php

namespace App\Filament\Dashboard\Resources\SocialLinks\Pages;

use App\Filament\Dashboard\Resources\SocialLinks\SocialLinkResource;
use Filament\Facades\Filament;
use Filament\Resources\Pages\CreateRecord;
use Override;

class CreateSocialLink extends CreateRecord
{
    protected static string $resource = SocialLinkResource::class;

    protected function
    mutateFormDataBeforeCreate(array $data): array
    {
        $data['trainer_profile_id'] = Filament::auth()->user()->trainer->id;
        return parent::mutateFormDataBeforeCreate($data);
    }
}
