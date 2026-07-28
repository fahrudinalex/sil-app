<?php

namespace App\Filament\Resources\Disasters\Pages;

use App\Filament\Resources\Disasters\DisasterResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditDisaster extends EditRecord
{
    protected static string $resource = DisasterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
