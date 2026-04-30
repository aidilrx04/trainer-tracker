<?php

namespace App\Filament\Resources\TrainerProfiles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TrainerProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('full_name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone_number')
                    ->tel()
                    ->required(),
                TextInput::make('years_experience')
                    ->required()
                    ->numeric(),
                TextInput::make('profile_picture')
                    ->default(null),
                Textarea::make('notable_clients')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('avg_evaluation_score')
                    ->default(null),
                TextInput::make('fee_structure')
                    ->default(null),
                Textarea::make('professional_summary')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('additional_info')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('cv_path')
                    ->default(null),
            ]);
    }
}
