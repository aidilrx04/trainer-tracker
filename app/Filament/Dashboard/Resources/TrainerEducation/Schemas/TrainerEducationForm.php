<?php

namespace App\Filament\Dashboard\Resources\TrainerEducation\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TrainerEducationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('degree_name'),
                TextInput::make('institution_name'),
                TextInput::make('completion_year')->numeric(),
                TextInput::make('location'),
                TextInput::make('grade'),
            ]);
    }
}
