<?php

namespace App\Filament\Resources\ItemVariants;

use App\Filament\Resources\ItemVariants\Pages\CreateItemVariant;
use App\Filament\Resources\ItemVariants\Pages\EditItemVariant;
use App\Filament\Resources\ItemVariants\Pages\ListItemVariants;
use App\Filament\Resources\ItemVariants\Pages\ViewItemVariant;
use App\Filament\Resources\ItemVariants\Schemas\ItemVariantForm;
use App\Filament\Resources\ItemVariants\Schemas\ItemVariantInfolist;
use App\Filament\Resources\ItemVariants\Tables\ItemVariantsTable;
use App\Models\ItemVariant;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ItemVariantResource extends Resource
{
    // Tambahkan baris ini untuk membuat grup menu
    protected static string|\UnitEnum|null $navigationGroup = 'Data Master';

    // Opsional: Urutan menu di dalam grup
    protected static ?int $navigationSort = 1;

    protected static ?string $model = ItemVariant::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ItemVariantForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ItemVariantInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ItemVariantsTable::configure($table);
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
            'index' => ListItemVariants::route('/'),
            'create' => CreateItemVariant::route('/create'),
            'view' => ViewItemVariant::route('/{record}'),
            'edit' => EditItemVariant::route('/{record}/edit'),
        ];
    }
}
