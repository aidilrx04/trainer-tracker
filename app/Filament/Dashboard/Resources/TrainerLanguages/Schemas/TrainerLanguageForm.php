<?php

namespace App\Filament\Dashboard\Resources\TrainerLanguages\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TrainerLanguageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('language')
                    ->required(),
                Select::make('profiency')
                    ->options([
                        'Native' => 'Native',
                        'Fluent' => 'Fluent',
                        'Professional Working Proficiency' => 'Professional working proficiency',
                        'Conversational' => 'Conversational',
                        'Basic' => 'Basic',
                    ])
                    ->required(),
            ]);
    }
}
