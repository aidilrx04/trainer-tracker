<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Username')
                    ->autocomplete(false)
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->columnSpanFull()
                    ->email()
                    ->autocomplete(false)
                    ->required(),
                TextInput::make('password')
                    ->autocomplete(false)
                    ->columnSpanFull()
                    ->password()
                    ->required(),
                Select::make('role_id')
                    ->columnSpanFull()
                    ->relationship(name: 'role', titleAttribute: 'name')
                    ->required(),
            ]);
    }
}
