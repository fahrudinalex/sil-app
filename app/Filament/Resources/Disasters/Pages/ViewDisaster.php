<?php

namespace App\Filament\Resources\Disasters\Pages;

use App\Filament\Resources\Disasters\DisasterResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDisaster extends ViewRecord
{
    protected static string $resource = DisasterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
