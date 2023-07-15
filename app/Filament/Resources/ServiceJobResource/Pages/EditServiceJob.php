<?php

namespace App\Filament\Resources\ServiceJobResource\Pages;

use App\Filament\Resources\ServiceJobResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServiceJob extends EditRecord
{
    protected static string $resource = ServiceJobResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
