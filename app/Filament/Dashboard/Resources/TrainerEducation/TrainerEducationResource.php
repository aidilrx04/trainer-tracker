<?php

namespace App\Filament\Dashboard\Resources\TrainerEducation;

use App\Filament\Dashboard\Resources\TrainerEducation\Pages\CreateTrainerEducation;
use App\Filament\Dashboard\Resources\TrainerEducation\Pages\EditTrainerEducation;
use App\Filament\Dashboard\Resources\TrainerEducation\Pages\ListTrainerEducation;
use App\Filament\Dashboard\Resources\TrainerEducation\Schemas\TrainerEducationForm;
use App\Filament\Dashboard\Resources\TrainerEducation\Tables\TrainerEducationTable;
use App\Models\TrainerEducation;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TrainerEducationResource extends Resource
{
    protected static ?string $model = TrainerEducation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'degree_name';

    public static function form(Schema $schema): Schema
    {
        return TrainerEducationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TrainerEducationTable::configure($table);
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
            'index' => ListTrainerEducation::route('/'),
            'create' => CreateTrainerEducation::route('/create'),
            'edit' => EditTrainerEducation::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('trainer_profile_id', Filament::auth()->user()->trainer->id);
    }
}
