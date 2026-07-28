<?php

namespace App\Filament\Resources\ItemVariants\Pages;

use App\Filament\Resources\ItemVariants\ItemVariantResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewItemVariant extends ViewRecord
{
    protected static string $resource = ItemVariantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
