<?php

namespace App\Filament\Resources\Disasters;

use App\Filament\Resources\Disasters\Pages\CreateDisaster;
use App\Filament\Resources\Disasters\Pages\EditDisaster;
use App\Filament\Resources\Disasters\Pages\ListDisasters;
use App\Filament\Resources\Disasters\Pages\ViewDisaster;
use App\Filament\Resources\Disasters\Schemas\DisasterForm;
use App\Filament\Resources\Disasters\Schemas\DisasterInfolist;
use App\Filament\Resources\Disasters\Tables\DisastersTable;
use App\Models\Disaster;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DisasterResource extends Resource
{
    protected static ?string $model = Disaster::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return DisasterForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DisasterInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DisastersTable::configure($table);
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
            'index' => ListDisasters::route('/'),
            'create' => CreateDisaster::route('/create'),
            'view' => ViewDisaster::route('/{record}'),
            'edit' => EditDisaster::route('/{record}/edit'),
        ];
    }
}
