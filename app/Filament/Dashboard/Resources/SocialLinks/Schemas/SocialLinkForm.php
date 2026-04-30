<?php

namespace App\Filament\Dashboard\Resources\SocialLinks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SocialLinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('platform')->columnSpanFull(),
                TextInput::make('url')->columnSpanFull(),
            ]);
    }
}
