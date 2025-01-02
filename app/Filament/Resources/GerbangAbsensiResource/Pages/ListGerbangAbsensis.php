<?php

namespace App\Filament\Resources\GerbangAbsensiResource\Pages;

use App\Filament\Resources\GerbangAbsensiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGerbangAbsensis extends ListRecords
{
    protected static string $resource = GerbangAbsensiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
