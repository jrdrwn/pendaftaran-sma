<?php

namespace App\Filament\Resources\OrtuWaliResource\Pages;

use App\Filament\Resources\OrtuWaliResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrtuWali extends EditRecord
{
    protected static string $resource = OrtuWaliResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
