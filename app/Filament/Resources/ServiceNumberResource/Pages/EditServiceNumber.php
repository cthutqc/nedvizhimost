<?php

namespace App\Filament\Resources\ServiceNumberResource\Pages;

use App\Filament\Resources\ServiceNumberResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServiceNumber extends EditRecord
{
    protected static string $resource = ServiceNumberResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
