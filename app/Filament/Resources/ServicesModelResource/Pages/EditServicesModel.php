<?php

namespace App\Filament\Resources\ServicesModelResource\Pages;

use App\Filament\Resources\ServicesModelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServicesModel extends EditRecord
{
    protected static string $resource = ServicesModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
