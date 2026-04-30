<?php

namespace App\Filament\Resources\TrainerProfiles;

use App\Filament\Resources\TrainerProfiles\Pages\CreateTrainerProfile;
use App\Filament\Resources\TrainerProfiles\Pages\EditTrainerProfile;
use App\Filament\Resources\TrainerProfiles\Pages\ListTrainerProfiles;
use App\Filament\Resources\TrainerProfiles\Pages\ViewTrainerProfile;
use App\Filament\Resources\TrainerProfiles\Schemas\TrainerProfileForm;
use App\Filament\Resources\TrainerProfiles\Schemas\TrainerProfileInfolist;
use App\Filament\Resources\TrainerProfiles\Tables\TrainerProfilesTable;
use App\Models\TrainerProfile;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TrainerProfileResource extends Resource
{
    protected static ?string $model = TrainerProfile::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'full_name';

    public static function form(Schema $schema): Schema
    {
        return TrainerProfileForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TrainerProfileInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TrainerProfilesTable::configure($table);
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
            'index' => ListTrainerProfiles::route('/'),
            'create' => CreateTrainerProfile::route('/create'),
            'view' => ViewTrainerProfile::route('/{record}'),
            'edit' => EditTrainerProfile::route('/{record}/edit'),
        ];
    }
}
