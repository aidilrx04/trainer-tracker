<?php

namespace App\Filament\Dashboard\Resources\SocialLinks\Pages;

use App\Filament\Dashboard\Resources\SocialLinks\SocialLinkResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSocialLinks extends ListRecords
{
    protected static string $resource = SocialLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
