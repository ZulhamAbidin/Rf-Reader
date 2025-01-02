<?php

namespace App\Filament\Resources\GerbangAbsensiResource\Pages;

use App\Filament\Resources\GerbangAbsensiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGerbangAbsensi extends EditRecord
{
    protected static string $resource = GerbangAbsensiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
