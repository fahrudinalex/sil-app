<?php

namespace App\Filament\Resources\Disasters\Pages;

use App\Filament\Resources\Disasters\DisasterResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDisasters extends ListRecords
{
    protected static string $resource = DisasterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
