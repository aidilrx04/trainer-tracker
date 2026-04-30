<?php

namespace App\Filament\Resources\TrainerProfiles\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TrainerProfileInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('full_name'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('phone_number'),
                TextEntry::make('years_experience')
                    ->numeric(),
                TextEntry::make('profile_picture')
                    ->placeholder('-'),
                TextEntry::make('notable_clients')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('avg_evaluation_score')
                    ->placeholder('-'),
                TextEntry::make('fee_structure')
                    ->placeholder('-'),
                TextEntry::make('professional_summary')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('additional_info')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('cv_path')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
