<?php

namespace App\Filament\Resources\UserPositionResource\Pages;

use App\Filament\Resources\UserPositionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserPosition extends EditRecord
{
    protected static string $resource = UserPositionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
