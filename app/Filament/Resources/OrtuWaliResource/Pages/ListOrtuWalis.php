<?php

namespace App\Filament\Resources\OrtuWaliResource\Pages;

use App\Filament\Resources\OrtuWaliResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrtuWalis extends ListRecords
{
    protected static string $resource = OrtuWaliResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
