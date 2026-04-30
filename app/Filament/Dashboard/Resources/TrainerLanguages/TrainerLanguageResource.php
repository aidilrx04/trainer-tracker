<?php

namespace App\Filament\Dashboard\Resources\TrainerLanguages;

use App\Filament\Dashboard\Resources\TrainerLanguages\Pages\CreateTrainerLanguage;
use App\Filament\Dashboard\Resources\TrainerLanguages\Pages\EditTrainerLanguage;
use App\Filament\Dashboard\Resources\TrainerLanguages\Pages\ListTrainerLanguages;
use App\Filament\Dashboard\Resources\TrainerLanguages\Schemas\TrainerLanguageForm;
use App\Filament\Dashboard\Resources\TrainerLanguages\Tables\TrainerLanguagesTable;
use App\Models\TrainerLanguage;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TrainerLanguageResource extends Resource
{
    protected static ?string $model = TrainerLanguage::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'language';

    public static function form(Schema $schema): Schema
    {
        return TrainerLanguageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TrainerLanguagesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTrainerLanguages::route('/'),
            'create' => CreateTrainerLanguage::route('/create'),
            'edit' => EditTrainerLanguage::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('trainer_profile_id', Filament::auth()->user()->trainer->id);
    }
}
